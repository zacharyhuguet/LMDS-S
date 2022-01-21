<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SavoirMarqueModeleController extends AbstractController
{
    /**
     * @Route("/SavoirMarqueModele", name="savoir_marque_modele")
     */
    public function index(): Response
    {
        return $this->render('savoir_marque_modele/index.html.twig', [
            'controller_name' => 'SavoirMarqueModeleController',
        ]);
    }
}
