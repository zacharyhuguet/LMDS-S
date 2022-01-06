<?php

namespace App\Controller;

use App\Entity\InformationAccueil;
use App\Form\InformationAccueilType;
use App\Repository\InformationAccueilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/magasin/information_accueil")
 */
class InformationAccueilController extends AbstractController
{
    /**
     * @Route("/", name="information_accueil_index", methods={"GET"})
     */
    public function index(InformationAccueilRepository $informationAccueilRepository): Response
    {
        return $this->render('information_accueil/index.html.twig', [
            'information_accueils' => $informationAccueilRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="information_accueil_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $informationAccueil = new InformationAccueil();
        $form = $this->createForm(InformationAccueilType::class, $informationAccueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($informationAccueil);
            $entityManager->flush();

            return $this->redirectToRoute('information_accueil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('information_accueil/new.html.twig', [
            'information_accueil' => $informationAccueil,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="information_accueil_show", methods={"GET"})
     */
    public function show(InformationAccueil $informationAccueil): Response
    {
        return $this->render('information_accueil/show.html.twig', [
            'information_accueil' => $informationAccueil,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="information_accueil_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, InformationAccueil $informationAccueil, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(InformationAccueilType::class, $informationAccueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('information_accueil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('information_accueil/edit.html.twig', [
            'information_accueil' => $informationAccueil,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="information_accueil_delete", methods={"POST"})
     */
    public function delete(Request $request, InformationAccueil $informationAccueil, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$informationAccueil->getId(), $request->request->get('_token'))) {
            $entityManager->remove($informationAccueil);
            $entityManager->flush();
        }

        return $this->redirectToRoute('information_accueil_index', [], Response::HTTP_SEE_OTHER);
    }
}
