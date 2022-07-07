<?php

namespace App\Controller;

use App\Entity\Producer;
use App\Form\ProducerType;
use App\Repository\ProducerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/producer')]
class ProducerController extends AbstractController
{
    #[Route('/', name: 'app_producer_index', methods: ['GET'])]
    public function index(ProducerRepository $producerRepository): Response
    {
        return $this->render('producer/index.html.twig', [
            'producers' => $producerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_producer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProducerRepository $producerRepository): Response
    {
        $producer = new Producer();
        $form = $this->createForm(ProducerType::class, $producer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $producerRepository->add($producer, true);

            return $this->redirectToRoute('app_producer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('producer/new.html.twig', [
            'producer' => $producer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_producer_show', methods: ['GET'])]
    public function show(Producer $producer): Response
    {
        return $this->render('producer/show.html.twig', [
            'producer' => $producer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_producer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Producer $producer, ProducerRepository $producerRepository): Response
    {
        $form = $this->createForm(ProducerType::class, $producer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $producerRepository->add($producer, true);

            return $this->redirectToRoute('app_producer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('producer/edit.html.twig', [
            'producer' => $producer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_producer_delete', methods: ['POST'])]
    public function delete(Request $request, Producer $producer, ProducerRepository $producerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$producer->getId(), $request->request->get('_token'))) {
            $producerRepository->remove($producer, true);
        }

        return $this->redirectToRoute('app_producer_index', [], Response::HTTP_SEE_OTHER);
    }
}
