<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\TatouageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjetController extends AbstractController
{
    /**
     * @Route("/projet", name="projet")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        $projets = $categoryRepository->findByName('projets');

        return $this->render('projet/index.html.twig', compact('projets'));
    }

    /**
     * @Route("/projet/{slug}", name="show-projet")
     */
    public function showProjet(TatouageRepository $tatouageRepository, $slug): Response
    {
        $projet = $tatouageRepository->findOneBySlug($slug);

        return $this->render('projet/show.html.twig',[
            'projet' => $projet
        ]);
    }
}
