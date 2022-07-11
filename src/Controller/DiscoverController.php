<?php

namespace App\Controller;

use App\Entity\Discover;
use App\Form\DiscoverType;
use App\Repository\DiscoverRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/discover')]
class DiscoverController extends AbstractController
{
    #[Route('/', name: 'app_discover_index', methods: ['GET'])]
    public function index(DiscoverRepository $discoverRepository): Response
    {
        return $this->render('discover/index.html.twig', [
            'discovers' => $discoverRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_discover_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DiscoverRepository $discoverRepository): Response
    {
        $discover = new Discover();
        $form = $this->createForm(DiscoverType::class, $discover);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $discoverRepository->add($discover, true);

            return $this->redirectToRoute('app_circuit_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('discover/new.html.twig', [
            'discover' => $discover,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_discover_show', methods: ['GET'])]
    public function show(Discover $discover): Response
    {
        return $this->render('discover/show.html.twig', [
            'discover' => $discover,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_discover_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Discover $discover, DiscoverRepository $discoverRepository): Response
    {
        $form = $this->createForm(DiscoverType::class, $discover);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $discoverRepository->add($discover, true);

            return $this->redirectToRoute('app_discover_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('discover/edit.html.twig', [
            'discover' => $discover,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_discover_delete', methods: ['POST'])]
    public function delete(Request $request, Discover $discover, DiscoverRepository $discoverRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$discover->getId(), $request->request->get('_token'))) {
            $discoverRepository->remove($discover, true);
        }

        return $this->redirectToRoute('app_discover_index', [], Response::HTTP_SEE_OTHER);
    }
}
