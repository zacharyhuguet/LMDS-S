<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Entity\Modele;
use App\Form\DevisStep1Type;
use App\Form\DevisStep2Type;
use App\Form\DevisStep3Type;
use App\Form\DevisStep4Type;
use App\Form\DevisStep5Type;
use App\Form\DevisStep6Type;
use App\Form\DevisStep2bType;
use App\Form\DevisStep3bType;
use App\Repository\MarqueRepository;
use App\Repository\ModeleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevisController extends AbstractController
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @Route("/devis", name="devis")
     */
    public function index(Request $request): Response
    {
        session_start();
        session_destroy();
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
        $form = $this->createForm(DevisStep1Type::class, $devis);
        $form->HandleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()) {
            $value = $request->get('devis_step1');
            $session = $this->requestStack->getSession();
            $session->set('nom', $value['nom']);
            $session->set('prenom', $value['prenom']);
            $session->set('email', $value['email']);
            $session->set('telephone', $value['telephone']);
            return $this->redirectToRoute('devis_2');
        }
        return $this->render('devis/devis_1.html.twig', [
            'controller_name' => 'DevisController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/devis_2", name="devis_2")
     */
    public function devis_2(Request $request): Response
    {
        $devis = new Devis();
        $form = $this->createForm(DevisStep2Type::class, $devis);
        $form->HandleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $value = $request->get('devis_step2');
            $session = $this->requestStack->getSession();
            $session->set('marque', $value['marque']);
            return $this->redirectToRoute('devis_3');
        }

        return $this->render('devis/devis_2.html.twig', [
            'controller_name' => 'DevisController',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/devis_2b", name="devis_2b")
     */
    public function devis_2b(Request $request): Response
    {
        $devis = new Devis();
        $form = $this->createForm(DevisStep2bType::class, $devis);
        $form->HandleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $value = $request->get('devis_step2b');
            $session = $this->requestStack->getSession();
            $session->set('marque', $value['marque']);
            return $this->redirectToRoute('devis_3b');
        }
        return $this->render('devis/devis_2b.html.twig', [
            'controller_name' => 'DevisController',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/devis_3", name="devis_3")
     */
    public function devis_3(Request $request): Response
    {
        $devis = new Devis();
        $session = $this->requestStack->getSession();
        $value = $request->get('devis_step3');
        $session = $this->requestStack->getSession();
        $session->set('modele', $value['modele']);
        $marque2 = $session->get('marque');
        $marque = (int)$marque2;
        dump($marque);
        $form = $this->createFormBuilder($devis)
        ->add('modele', EntityType::class, array(
            'class' => Modele::class,
            'choice_label' => 'nom_modele',
            'placeholder' => '=== Choisir un modèle ===',
            'choice_value' => 'nom_modele',
            'query_builder' => function (ModeleRepository $modele) {
                return $modele->createQueryBuilder('m')
                    ->andWhere('m.marque = :marque')
                    ->setParameter('marque', $marque)
                    ;
            },
        ))->add('Etape_suivante', SubmitType::class)
        ->getForm();
        

        $form->HandleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $value = $request->get('devis_step3');
            $session = $this->requestStack->getSession();
            $session->set('modele', $value['modele']);
            return $this->redirectToRoute('devis_4');
        }
        return $this->render('devis/devis_3.html.twig', [
            'controller_name' => 'DevisController',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/devis_3b", name="devis_3b")
     */
    public function devis_3b(Request $request): Response
    {

        $devis = new Devis();
        $form = $this->createForm(DevisStep3bType::class, $devis);
        $form->HandleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $value = $request->get('devis_step3b');
            $session = $this->requestStack->getSession();
            $session->set('modele', $value['modele']);
            return $this->redirectToRoute('devis_4');
        }
        return $this->render('devis/devis_3b.html.twig', [
            'controller_name' => 'DevisController',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/devis_4", name="devis_4")
     */
    public function devis_4(Request $request): Response
    {
        $devis = new Devis();
        $form = $this->createForm(DevisStep4Type::class, $devis);
        $form->HandleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $value = $request->get('devis_step4');
            $session = $this->requestStack->getSession();
            $session->set('probleme', $value['probleme']);
            return $this->redirectToRoute('devis_5');
        }
        return $this->render('devis/devis_4.html.twig', [
            'controller_name' => 'DevisController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/devis_5", name="devis_5")
     */
    public function devis_5(Request $request): Response
    {
        $devis = new Devis();
        $form = $this->createForm(DevisStep5Type::class, $devis);
        $form->HandleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $value = $request->get('devis_step5');
            $session = $this->requestStack->getSession();
            if ($value['commentaire'] == ""){
                $value['commentaire'] = "Aucun Commentaire";
            } 
            if (!isset($value['protection'] ) || $value['protection'] == ""){
                $value['protection'] = "Non";
            } else {
                $value['protection'] = "Oui";
            }
            
            $session->set('commentaire', $value['commentaire']);
            $session->set('protection', $value['protection']);

            return $this->redirectToRoute('devis_6');
        }
        return $this->render('devis/devis_5.html.twig', [
            'controller_name' => 'DevisController',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/devis_6", name="devis_6")
     */
    public function devis_6(MarqueRepository $marque, Request $request): Response
    {
        $devis = new Devis();
        $form = $this->createForm(DevisStep6Type::class, $devis);
        $session = $this->requestStack->getSession();
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('devis_7');
        }
        if (is_numeric($session->get('marque'))) {
            $_SESSION['marque'] = $marque->findMarque($_SESSION['marque']);
        }
        return $this->render('devis/devis_6.html.twig', [
            'controller_name' => 'DevisController',
            'form' => $form->createView(),
            'nom' => $session->get('nom'),
            'prenom' => $session->get('prenom'),
            'email' => $session->get('email'),
            'telephone' => $session->get('telephone'),
            'marque' => $session->get('marque'),
            'modele' => $session->get('modele'),
            'probleme' => $session->get('probleme'),
            'commentaire' => $session->get('commentaire'),
            'protection' => $session->get('protection'),
        ]);
    }
    /**
     * @Route("/devis_7", name="devis_7")
     */
    public function devis_7(EntityManagerInterface $entityManager, Request $request): Response
    {
        $devis = new Devis();
        $devis->setDate(new \DateTime('now'));
        $devis->setStatus('Nouveau-Devis');
        $devis->setNom($_SESSION['nom']);
        $devis->setPrenom($_SESSION['prenom']);
        $devis->setEmail($_SESSION['email']);
        $devis->setTelephone($_SESSION['telephone']);
        $devis->setMarque($_SESSION['marque']);
        $devis->setModele($_SESSION['modele']);
        $devis->setProbleme($_SESSION['probleme']);
        $devis->setCommentaire($_SESSION['commentaire']);
        $devis->setProtection($_SESSION['protection']);

        $entityManager->persist($devis);
        $entityManager->flush();
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        session_destroy();
        return $this->render('devis/devis_7.html.twig', [
            'controller_name' => 'DevisController',
            'nom' => $nom,
            'prenom' => $prenom,
        ]);
    }

}
