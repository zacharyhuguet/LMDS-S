<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Form\ProduitsType;
use App\Repository\ProduitsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/produits")
 */
class ProduitsController extends AbstractController
{
    /**
     * @Route("/", name="produits_index", methods={"GET"})
     */
    public function index(ProduitsRepository $produitsRepository, Request $request): Response
    {

        // $defaultData = ['message' => 'Type your message here'];
        // $form = $this->createFormBuilder($defaultData)
        //     ->setAction($this->generateUrl('/produits'))
        //     ->add('Prix', ChoiceType::class, [
        //         'choices' => [
        //             'Croissant' => 'Croissant',
        //             'Décroissant' => 'Décroissant',
        //         ],
        //             'expanded' => true,
        //             'required' => false,
        //     ])
        //     ->add('Prix_minimum', NumberType::class,[
        //         'required' => false,
        //     ]
        //     )
        //     ->add('Prix_maximum', NumberType::class,[
        //         'required' => false,
        //     ]
        //     )
        //     ->add('Filtrer', SubmitType::class)
        //     ->getForm();

        //     $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {

            
        //     return $this->render('produits/index.html.twig', [
        //         'produits' => $produitsRepository->findAllWithFilter(),
        //         'form' => $form->createView(),
        //     ]);
        // }

        return $this->render('produits/index.html.twig', [
            'produits' => $produitsRepository->findAll(),
            // 'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="produits_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $produit = new Produits();
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('produits_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produits/new.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="produits_show", methods={"GET"})
     */
    public function show(Produits $produit): Response
    {
        return $this->render('produits/show.html.twig', [
            'produit' => $produit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="produits_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Produits $produit, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('produits_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produits/edit.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="produits_delete", methods={"POST"})
     */
    public function delete(Request $request, Produits $produit, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produits_index', [], Response::HTTP_SEE_OTHER);
    }
}
