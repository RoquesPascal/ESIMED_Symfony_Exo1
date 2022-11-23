<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FlyRepository;

class FlyController extends AbstractController
{
    #[Route('/', name: 'app_fly')]
    public function index(FlyRepository $flyRepository): Response
    {
        $listeVols = $flyRepository->findAll();

        return $this->render('fly/index.html.twig', [
            'listeVols' => $listeVols,
        ]);
    }
}
