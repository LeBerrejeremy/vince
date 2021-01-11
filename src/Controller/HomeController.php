<?php

namespace App\Controller;

use App\Repository\HeaderRepository;
use App\Repository\TatouageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(TatouageRepository $tatouageRepository, HeaderRepository $headerRepository): Response
    {
        $tatouages = $tatouageRepository->findByIsBest(1);
        $headers   = $headerRepository->findall();

        return $this->render('home/index.html.twig', compact('tatouages', 'headers'));
    }
}
