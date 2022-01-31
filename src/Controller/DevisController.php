<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Entity\Modele;
use App\Form\DevisStep1Type;
use App\Form\DevisStep2bType;
use App\Form\DevisStep2Type;
use App\Form\DevisStep3bType;
use App\Form\DevisStep3Type;
use App\Form\DevisStep4Type;
use App\Form\DevisStep5Type;
use App\Form\DevisStep6Type;
use App\Repository\MarqueRepository;
use App\Repository\ModeleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DevisController extends AbstractController
{
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
        session_start();
        session_destroy();
        $devis = new Devis();
        $form = $this->createForm(DevisStep1Type::class, $devis);
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
        
        $step1 = $request->get('devis_step1');
        if (isset($step1)){
            $_SESSION['nom'] = $step1['nom'];
            $_SESSION['prenom'] = $step1['prenom'];
            $_SESSION['email'] = $step1['email'];
            $_SESSION['telephone'] = $step1['telephone'];
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
        $form = $this->createForm(DevisStep3Type::class, $devis);
        $form->HandleRequest($request);
        $step2 = $request->get('devis_step2');
        if (isset($step2['marque'])){
            $_SESSION['marque'] = $step2['marque'];
        }
        $form = $this->createFormBuilder($devis)
            ->add('modele', EntityType::class, array(
                'class' => Modele::class,
                'choice_label' => 'nom_modele',
                'placeholder' => '=== Choisir un modèle ===',
                'choice_value' => 'nom_modele',
                'query_builder' => function (ModeleRepository $modele) {
                    return $modele->createQueryBuilder('m')
                        ->andWhere('m.marque = :marque')
                        ->setParameter('marque', $_SESSION['marque']);
                },
            ))->add('Etape_suivante', SubmitType::class)
            ->getForm();

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
        $step2b = $request->get('devis_step2b');
        if (isset($step2b)){
            $_SESSION['marque'] = $step2b['marque'];
        }
        $step3 = $request->get('devis_step3');
        if (isset($step3)){
            $_SESSION['marque'] = $step3['marque'];
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
        $step3 = $request->get('form');
        if (isset($step3)){
            $_SESSION['modele'] = $step3['modele'];
        }
        $step3b = $request->get('devis_step3b');
        if (isset($step3b)){
            $_SESSION['modele'] = $step3b['modele'];
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
        $step4 = $request->get('devis_step4');
        $_SESSION['probleme'] = $step4['probleme'];
          
      
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
        $form->HandleRequest($request);
        $step5 = $request->get('devis_step5');
        if (isset($step5['commentaire'])) {
            if ($step5['commentaire'] != "") {
                $_SESSION['commentaire'] = $step5['commentaire'];
            } else {
                $_SESSION['commentaire'] = 'Aucun commentaire';
            }
        }
        if (isset($step5['protection'])) {
            $protection = "Oui, je veux la protection d'écran Invisible Shield et profitez de 5% sur mon devis !";
            $_SESSION['protection'] = "Oui";
        } else {
            $protection = "Non, je ne veux pas de protection d'écran Invisible Shield !";
            $_SESSION['protection'] = "Non";
        }
        if (is_numeric($_SESSION['marque']) ){
            $_SESSION['marque'] = $marque->findMarque($_SESSION['marque']);
        } 
        return $this->render('devis/devis_6.html.twig', [
            'controller_name' => 'DevisController',
            'form' => $form->createView(),
            'nom' => $_SESSION['nom'],
            'prenom' => $_SESSION['prenom'],
            'email' => $_SESSION['email'],
            'telephone' => $_SESSION['telephone'],
            'marque' => $_SESSION['marque'],
            'modele' => $_SESSION['modele'],
            'probleme' => $_SESSION['probleme'],
            'commentaire' => $_SESSION['commentaire'],
            'protection' => $protection,
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
        $devis->setProbleme1($_SESSION['probleme']);
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
