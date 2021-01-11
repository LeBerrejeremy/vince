<?php

namespace App\Controller;

use App\Entity\Tatouage;
use App\Repository\CategoryRepository;
use App\Repository\TatouageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TatouageController extends AbstractController
{
    /**
     * @Route("/tatouage", name="tatouage")
     */
    public function index(CategoryRepository $category): Response
    {
        $tatouages = $category->findByName('tatouages');

        return $this->render('tatouage/index.html.twig',[
            'tatouages' => $tatouages
        ]);
    }

    /**
     * @Route("/tatouage/{slug}", name="show")
     */
    public function show(TatouageRepository $tatouageRepository, $slug): Response
    {
        $tatouage = $tatouageRepository->findOneBySlug($slug);

        return $this->render('tatouage/show.html.twig',[
            'tatouage' => $tatouage
        ]);
    }
}
