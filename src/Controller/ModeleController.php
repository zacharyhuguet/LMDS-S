<?php

namespace App\Controller;

use App\Entity\Modele;
use App\Form\ModeleType;
use App\Repository\ModeleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("magasin/modele")
 */
class ModeleController extends AbstractController
{
    /**
     * @Route("/", name="modele_index", methods={"GET"})
     */
    public function index(ModeleRepository $modeleRepository): Response
    {
        return $this->render('modele/index.html.twig', [
            'modeles' => $modeleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="modele_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $modele = new Modele();
        $form = $this->createForm(ModeleType::class, $modele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($modele);
            $entityManager->flush();

            return $this->redirectToRoute('modele_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('modele/new.html.twig', [
            'modele' => $modele,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="modele_show", methods={"GET"})
     */
    public function show(Modele $modele): Response
    {
        return $this->render('modele/show.html.twig', [
            'modele' => $modele,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="modele_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Modele $modele, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ModeleType::class, $modele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('modele_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('modele/edit.html.twig', [
            'modele' => $modele,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="modele_delete", methods={"POST"})
     */
    public function delete(Request $request, Modele $modele, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modele->getId(), $request->request->get('_token'))) {
            $entityManager->remove($modele);
            $entityManager->flush();
        }

        return $this->redirectToRoute('modele_index', [], Response::HTTP_SEE_OTHER);
    }
}
