<?php

namespace App\Controller;

use App\Repository\PhotothequeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\InformationAccueilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PhotothequeRepository $photothequeRepository, InformationAccueilRepository $repository): Response
    {
        $infos = $repository->findAll();
        $phototheque = $photothequeRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'infos' => $infos,
            'phototheques' => $phototheque,
        ]);
    }
}
