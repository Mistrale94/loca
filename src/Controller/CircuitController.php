<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Entity\Circuit;
use App\Form\CircuitType;
use App\Repository\CircuitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/circuit')]
class CircuitController extends AbstractController
{
    #[Route('/', name: 'app_circuit_index', methods: ['GET'])]
    public function index(CircuitRepository $circuitRepository): Response
    {
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        return $this->render('circuit/index.html.twig', [
            'circuits' => $circuitRepository->findAll(),
            'form' => $form->createView()
        ]);
    }

    #[Route('/list', name: 'app_circuit_list', methods: ['GET'])]
    public function list(CircuitRepository $circuitRepository): Response
    {
        return $this->render('circuit/list.html.twig', [
            'listCircuits' => $circuitRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_circuit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CircuitRepository $circuitRepository): Response
    {
        $circuit = new Circuit();
        $form = $this->createForm(CircuitType::class, $circuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $circuitRepository->add($circuit, true);

            return $this->redirectToRoute('app_program_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('circuit/new.html.twig', [
            'circuit' => $circuit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_circuit_show', methods: ['GET'])]
    public function show(Circuit $circuit, CircuitRepository $circuitRepository): Response
    {
        return $this->render('circuit/show.html.twig', [
            'circuit' => $circuit,
            'circuits' => $circuitRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_circuit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Circuit $circuit, CircuitRepository $circuitRepository): Response
    {
        $form = $this->createForm(CircuitType::class, $circuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $circuitRepository->add($circuit, true);

            return $this->redirectToRoute('app_circuit_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('circuit/edit.html.twig', [
            'circuit' => $circuit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/', name: 'app_circuit_delete', methods: ['POST'])]
    public function delete(Request $request, Circuit $circuit, CircuitRepository $circuitRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$circuit->getId(), $request->request->get('_token'))) {
            $circuitRepository->remove($circuit, true);
        }

        return $this->redirectToRoute('app_circuit_list', [], Response::HTTP_SEE_OTHER);
    }
}
