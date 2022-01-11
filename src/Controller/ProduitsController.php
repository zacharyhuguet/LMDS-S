<?php

namespace App\Controller;

use App\Repository\ProduitsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/produits", name="produits")
     */
    public function index(ProduitsRepository $repository): Response
    {
        $produits = $repository->findAll();
        return $this->render('produits/index.html.twig', [
            'controller_name' => 'ProduitsController',
            'produits' => $produits
        ]);
    }
}

// public function index(InformationAccueilRepository $repository): Response
// {
//     $infos = $repository->findAll();
//     return $this->render('home/index.html.twig', [
//         'controller_name' => 'HomeController',
//         'infos' => $infos
//     ]);
// }