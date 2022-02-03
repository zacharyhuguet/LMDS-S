<?php

namespace App\Controller;

use App\Repository\DevisRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MagasinController extends AbstractController
{
    /**
     * @Route("/magasin", name="magasin")
     */
    public function index(DevisRepository $devisRepository): Response
    {
        return $this->redirectToRoute('devis_admin_index');
    }
}
