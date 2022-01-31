<?php

namespace App\Controller;

use App\Entity\Phototheque;
use App\Form\PhotothequeType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PhotothequeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/magasin/phototheque")
 */
class PhotothequeController extends AbstractController
{
    /**
     * @Route("/", name="phototheque_index", methods={"GET"})
     */
    public function index(PhotothequeRepository $photothequeRepository): Response
    {
        return $this->render('phototheque/index.html.twig', [
            'phototheques' => $photothequeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="phototheque_new", methods={"GET", "POST"})
     */
    function new (Request $request, SluggerInterface $slugger, EntityManagerInterface $entityManager): Response {
        $phototheque = new Phototheque();
        $form = $this->createForm(PhotothequeType::class, $phototheque);
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
                        $this->getParameter('images_directory2'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'imageFilename' property to store the PDF file name
                // instead of its contents
                $phototheque->setImage($newFilename);
            }

            $entityManager->persist($phototheque);
            $entityManager->flush();

            return $this->redirectToRoute('phototheque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('phototheque/new.html.twig', [
            'phototheque' => $phototheque,
            'form' => $form,
        ]);

    }

    /**
     * @Route("/{id}", name="phototheque_show", methods={"GET"})
     */
    public function show(Phototheque $phototheque): Response
    {
        return $this->render('phototheque/show.html.twig', [
            'phototheque' => $phototheque,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="phototheque_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Phototheque $phototheque, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createFormBuilder($phototheque)
        ->add('titre')
        ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('phototheque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('phototheque/edit.html.twig', [
            'phototheque' => $phototheque,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="phototheque_delete", methods={"POST"})
     */
    public function delete(Request $request, Phototheque $phototheque, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $phototheque->getId(), $request->request->get('_token'))) {
            $nomimage = $this->getParameter("images_directory2") . '/' . $phototheque->getImage();
            if (file_exists($nomimage)){
                unlink($nomimage);
            }
           
            $entityManager->remove($phototheque);
            $entityManager->flush();
        }
     return $this->redirectToRoute('phototheque_index', [], Response::HTTP_SEE_OTHER);
    }

}
