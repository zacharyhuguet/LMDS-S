<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Form\MarqueType;
use App\Repository\MarqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("magasin/marque")
 */
class MarqueController extends AbstractController
{
    /**
     * @Route("/", name="marque_index", methods={"GET"})
     */
    public function index(MarqueRepository $marqueRepository): Response
    {
        return $this->render('marque/index.html.twig', [
            'marques' => $marqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="marque_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $marque = new Marque();
        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($marque);
            $entityManager->flush();

            return $this->redirectToRoute('marque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('marque/new.html.twig', [
            'marque' => $marque,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="marque_show", methods={"GET"})
     */
    public function show(Marque $marque): Response
    {
        return $this->render('marque/show.html.twig', [
            'marque' => $marque,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="marque_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Marque $marque, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('marque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('marque/edit.html.twig', [
            'marque' => $marque,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="marque_delete", methods={"POST"})
     */
    public function delete(Request $request, Marque $marque, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$marque->getId(), $request->request->get('_token'))) {
            $entityManager->remove($marque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('marque_index', [], Response::HTTP_SEE_OTHER);
    }
}
