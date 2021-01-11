<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\TatouageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IllustrationController extends AbstractController
{
    /**
     * @Route("/illustration", name="illustration")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        $illustrations = $categoryRepository->findByName('illustration');

        return $this->render('illustration/index.html.twig', compact('illustrations'));
    }

    /**
     * @Route("/illustration/{slug}", name="show-illustration")
     */
    public function showProjet(TatouageRepository $tatouageRepository, $slug): Response
    {
        $illustration = $tatouageRepository->findOneBySlug($slug);

        return $this->render('illustration/show.html.twig',[
            'illustration' => $illustration
        ]);
    }
}
