<?php

namespace App\Controller;

use App\Entity\Filter;
use App\Form\FilterType;
use App\Repository\FilterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/filter')]
class FilterController extends AbstractController
{
    #[Route('/', name: 'app_filter_index', methods: ['GET'])]
    public function index(FilterRepository $filterRepository): Response
    {
        return $this->render('filter/index.html.twig', [
            'filters' => $filterRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_filter_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FilterRepository $filterRepository): Response
    {
        $filter = new Filter();
        $form = $this->createForm(FilterType::class, $filter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $filterRepository->add($filter, true);

            return $this->redirectToRoute('app_filter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('filter/new.html.twig', [
            'filter' => $filter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_filter_show', methods: ['GET'])]
    public function show(Filter $filter): Response
    {
        return $this->render('filter/show.html.twig', [
            'filter' => $filter,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_filter_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Filter $filter, FilterRepository $filterRepository): Response
    {
        $form = $this->createForm(FilterType::class, $filter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $filterRepository->add($filter, true);

            return $this->redirectToRoute('app_filter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('filter/edit.html.twig', [
            'filter' => $filter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_filter_delete', methods: ['POST'])]
    public function delete(Request $request, Filter $filter, FilterRepository $filterRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$filter->getId(), $request->request->get('_token'))) {
            $filterRepository->remove($filter, true);
        }

        return $this->redirectToRoute('app_filter_index', [], Response::HTTP_SEE_OTHER);
    }
}
