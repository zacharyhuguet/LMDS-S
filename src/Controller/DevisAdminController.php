<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Form\Devis1Type;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("magasin/devis")
 */
class DevisAdminController extends AbstractController
{
    /**
     * @Route("/", name="devis_admin_index", methods={"GET"})
     */
    public function index(DevisRepository $devisRepository): Response
    {
        return $this->render('devis_admin/index.html.twig', [
            'devis' => $devisRepository->findByDate(),
        ]);
    }

    /**
     * @Route("/new", name="devis_admin_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $devi = new Devis();
        $form = $this->createForm(Devis1Type::class, $devi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($devi);
            $entityManager->flush();

            return $this->redirectToRoute('devis_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('devis_admin/new.html.twig', [
            'devi' => $devi,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="devis_admin_show", methods={"GET"})
     */
    public function show(Devis $devi): Response
    {
        return $this->render('devis_admin/show.html.twig', [
            'devi' => $devi,
        ]);
    }
    /**
     * @Route("/{id}/repondre-devis", name="devis_admin_repondre_devis", methods={"GET", "POST"})
     */
    public function repondreDevis(Request $request, Devis $devi): Response
    {
        $defaultData = ['message' => 'message 1'];
        $form = $this->createFormBuilder($defaultData)
        ->add('PrixProbleme1', TextType::class,['required' => false])
        ->add('PrixProbleme2', TextType::class,['required' => false])
        ->add('PrixProbleme3', TextType::class,['required' => false])
        ->add('save', SubmitType::class,[
            'attr' => ['class' => 'btn btn-success'],
            'label' => 'Répondre'
        ]
        )
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $value = $request->get('form');
            $probleme1 = $value['PrixProbleme1'];
            $probleme2 = $value['PrixProbleme2'];
            $probleme3 = $value['PrixProbleme3'];
            dump($value);

        }
        return $this->render('devis_admin/repondre-devis.html.twig', [
            'devi' => $devi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="devis_admin_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Devis $devi, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Devis1Type::class, $devi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('devis_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('devis_admin/edit.html.twig', [
            'devi' => $devi,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="devis_admin_delete", methods={"POST"})
     */
    public function delete(Request $request, Devis $devi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$devi->getId(), $request->request->get('_token'))) {
            $entityManager->remove($devi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('devis_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
