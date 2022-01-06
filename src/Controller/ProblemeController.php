<?php

namespace App\Controller;

use App\Entity\Probleme;
use App\Form\ProblemeType;
use App\Repository\ProblemeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("magasin/probleme")
 */
class ProblemeController extends AbstractController
{
    /**
     * @Route("/", name="probleme_index", methods={"GET"})
     */
    public function index(ProblemeRepository $problemeRepository): Response
    {
        return $this->render('probleme/index.html.twig', [
            'problemes' => $problemeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="probleme_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $probleme = new Probleme();
        $form = $this->createForm(ProblemeType::class, $probleme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($probleme);
            $entityManager->flush();

            return $this->redirectToRoute('probleme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('probleme/new.html.twig', [
            'probleme' => $probleme,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="probleme_show", methods={"GET"})
     */
    public function show(Probleme $probleme): Response
    {
        return $this->render('probleme/show.html.twig', [
            'probleme' => $probleme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="probleme_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Probleme $probleme, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProblemeType::class, $probleme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('probleme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('probleme/edit.html.twig', [
            'probleme' => $probleme,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="probleme_delete", methods={"POST"})
     */
    public function delete(Request $request, Probleme $probleme, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$probleme->getId(), $request->request->get('_token'))) {
            $entityManager->remove($probleme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('probleme_index', [], Response::HTTP_SEE_OTHER);
    }
}
