<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FlyRepository;
use Symfony\Component\HttpFoundation\Request;

class FlyController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(FlyRepository $flyRepository): Response
    {
        $listeVols = $flyRepository->findAll();

        return $this->render('fly/index.html.twig', [
            'listeVols' => $listeVols,
        ]);
    }

    #[Route('/show/{id}', name: 'show')]
    public function show(FlyRepository $flyRepository, Request $request): Response
    {
        $vol = $flyRepository->find($request->attributes->get('id'));

        return $this->render('fly/show.html.twig', [
            'vol' => $vol,
        ]);
    }
}
