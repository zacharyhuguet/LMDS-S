<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Entity\Marque;
use App\Form\DevisStepOneType;
use App\Form\DevisStepTwoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevisController extends AbstractController
{
    /**
     * @Route("/devis", name="devis")
     */
    public function index(Request $request): Response
    {

        return $this->render('devis/index.html.twig', [
            'controller_name' => 'DevisController',
        ]);
    }
    /**
     * @Route("/devis_1", name="devis_1")
     */
    public function devis_1(Request $request): Response
    {

        $devis = new Devis();
        $form = $this->createForm(DevisStepOneType::class, $devis);
        return $this->render('devis/devis_1.html.twig', [
            'controller_name' => 'DevisController',
            'form' => $form->createView()
        ]);
    }
        /**
     * @Route("/devis_2", name="devis_2")
     */
    public function devis_2(Request $request): Response
    {
        $marque = new Marque();
        $form = $this->createForm(DevisStepTwoType::class, $marque);
        return $this->render('devis/devis_2.html.twig', [
            'controller_name' => 'DevisController',
            'form' => $form->createView()
        ]);
    }
}
