<?php

namespace App\Controller;

use App\Entity\Fly;
use App\Form\FlyType;
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

    #[Route('/add', name: 'add')]
    public function add(FlyRepository $flyRepository, Request $request): Response
    {
        $vol = new Fly();
        $form = $this->createForm(FlyType::class, $vol);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $flyRepository->save($vol, true);
            return $this->redirectToRoute('index');
        }

        return $this->render('fly/add_edit.html.twig', [
            'ajout' => true,
            'form' => $form->createView()
        ]);
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(FlyRepository $flyRepository, Request $request): Response
    {
        $vol = $flyRepository->find($request->attributes->get('id'));
        $form = $this->createForm(FlyType::class, $vol);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $flyRepository->save($vol, true);
            return $this->redirectToRoute('index');
        }

        return $this->render('fly/add_edit.html.twig', [
            'ajout' => false,
            'form' => $form->createView()
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

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(FlyRepository $flyRepository, Request $request): Response
    {
        $vol = $flyRepository->find($request->attributes->get('id'));
        if($vol)
            $flyRepository->remove($vol, true);

        return $this->redirectToRoute('index');
    }
}
