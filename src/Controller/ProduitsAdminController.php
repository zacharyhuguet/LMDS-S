<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Form\ProduitsType;
use App\Repository\ProduitsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("magasin/produits")
 */
class ProduitsAdminController extends AbstractController
{
    /**
     * @Route("/", name="produits_admin_index", methods={"GET"})
     */
    public function index(ProduitsRepository $produitsRepository): Response
    {
        return $this->render('produits_admin/index.html.twig', [
            'produits' => $produitsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="produits_admin_new", methods={"GET", "POST"})
     */
    function new (Request $request, SluggerInterface $slugger, EntityManagerInterface $entityManager): Response {
        $produit = new Produits();
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('image')->getData();


            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                // Move the file to the directory where images are stored
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'imageFilename' property to store the PDF file name
                // instead of its contents
                $produit->setImage($newFilename);
            }

            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('produits_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produits_admin/new.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);

    }

    /**
     * @Route("/{id}", name="produits_admin_show", methods={"GET"})
     */
    public function show(Produits $produit): Response
    {
        return $this->render('produits_admin/show.html.twig', [
            'produit' => $produit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="produits_admin_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Produits $produit, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('produits_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produits_admin/edit.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="produits_admin_delete", methods={"POST"})
     */
    public function delete(Request $request, Produits $produit, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $produit->getId(), $request->request->get('_token'))) {
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produits_admin_index', [], Response::HTTP_SEE_OTHER);
    }

}
