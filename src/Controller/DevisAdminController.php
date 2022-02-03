<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Devis;
use App\Form\Devis1Type;
use Symfony\Component\Mime\Email;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
     * @Route("/envoyer-mail", name="envoyer-mail", methods={"GET", "POST"})
     */
    public function envoyerMail(MailerInterface $mailer,Request $request,DevisRepository $repository, EntityManagerInterface $entityManager): Response
    {
        $defaultData = ['message' => 'envoiMail'];
        $form = $this->createFormBuilder($defaultData)
            ->add('ObjetMail', TextType::class,
            ['data' => 'Réponse Devis Mr / Mme '. $_GET["nom"].'- La Maison Du Smartphone'])
            
            ->add('MessageMail', TextareaType::class,
            ['data' => 'Bonjour Mr / Mme '.  $_GET["nom"] .' '. $_GET["prenom"] .',<br/>
        Voici la réponse de votre devis que vous avez fais sur notre site internet.<br/>
        Il y en a pour un total de '. $_GET['totalTTC'].' euros, voir le devis en pièce jointe.<br/>
        Amicalement<br/>
        La Maison Du Smartphone
            '])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'btn btn-success'],
                'label' => 'Envoyez mail avec devis',
            ]
            )
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
                $objet = $data['ObjetMail'];
                $message = $data['MessageMail'];
                $email = (new Email())
                    ->from('contact@la-maison-du-smartphone.fr')
                    ->to($_GET['email'])
                    ->priority(Email::PRIORITY_HIGH)
                    ->attachFromPath('devis-reponse/' . $_GET['filename'] . '.pdf')
                    ->subject($objet)
                    ->html($message);
                $mailer->send($email);
                $devi = $repository->findOneById($_GET['id']);
                $devi->setStatus("Mail-envoyé");
                $entityManager->persist($devi);
                $entityManager->flush($devi);
                

             return $this->redirectToRoute('devis_admin_index');
        }
        return $this->render('devis_admin/envoyer-mail.html.twig', [
            'nom' => $_GET['nom'],
            'prenom' => $_GET['prenom'],
            'email' => $_GET['email'],
            'totalTTC' => $_GET['totalTTC'],
            'filename' => $_GET['filename'],
            'form' => $form->createView()
        ]);
        
    }
    /**
     * @Route("/new", name="devis_admin_new", methods={"GET", "POST"})
     */
    function new (Request $request, EntityManagerInterface $entityManager): Response {
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
        $defaultData = ['message' => 'repondreDevis'];
        $form = $this->createFormBuilder($defaultData)
            ->add('Prestation1', TextType::class, )
            ->add('Prix1', NumberType::class)

            ->add('Prestation2', TextType::class, ['required' => false])
            ->add('Prix2', NumberType::class, ['required' => false])

            ->add('Prestation3', TextType::class, ['required' => false])
            ->add('Prix3', NumberType::class, ['required' => false])

            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'btn btn-success'],
                'label' => 'Générer devis PDF',
            ]
            )
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repondreDevis = $form->getData();

            if (isset($repondreDevis['Prestation1']) && isset($repondreDevis['Prix1'])) {
                $prestation1 = $repondreDevis['Prestation1'];
                $prix1 = $repondreDevis['Prix1'];
                $quantite1 = 1;
                $prix1HT = $prix1 * 0.80;
                $prix1Set = $prix1;
            } else {
                $prestation1 = " ";
                $prix1 = " ";
                $quantite1 = " ";
                $prix1HT = " ";
                $prix1Set =0;
            }
            if (isset($repondreDevis['Prestation2']) && isset($repondreDevis['Prix2'])) {
                $prestation2 = $repondreDevis['Prestation2'];
                $prix2 = $repondreDevis['Prix2'];
                $quantite2 = 1;
                $prix2HT = $prix2 * 0.80;
                $prix2Set = $prix2;
            } else {
                $prestation2 = " ";
                $prix2 = " ";
                $quantite2 = " ";
                $prix2HT = " ";
                $prix2Set =0;

            }
            if (isset($repondreDevis['Prestation3']) && isset($repondreDevis['Prix3'])) {
                $prestation3 = $repondreDevis['Prestation3'];
                $prix3 = $repondreDevis['Prix3'];
                $quantite3 = 1;
                $prix3HT = $prix3 * 0.80;
                $prix3Set = $prix3;
            } else {
                $prestation3 = " ";
                $prix3 = " ";
                $quantite3 = " ";
                $prix3HT = " ";
                $prix3Set =0;
            }
            if ($devi->getProtection() == "Oui"){
                $reduction = 0.05;
            } else {
                $reduction = 0;
            }
            $sousTotalHT = ($prix1Set + $prix2Set + $prix3Set)*0.80;
            $reductionDevis = $sousTotalHT * $reduction;
            $totalTTC =($prix1Set + $prix2Set + $prix3Set) - $reductionDevis;
            $dontTva = ($prix1Set + $prix2Set + $prix3Set) - $sousTotalHT;
            $options = new Options();
            $options->set('defaultFont', 'Roboto');
            $dompdf = new Dompdf($options);
            $html = "
            <style>
            .header-pdf img { width:100px;display:block;}
            .header-pdf h1{position:absolute; top:0; right:0; background-color:rgb(214, 158, 4);color:white;padding:10px;font-weight:bolder;text-align:center;}
            .client{float:right;}
            .table{width:100%;max-width:100%;margin-bottom:1rem;background-color:transparent}
            .table td,.table th{padding:.75rem;vertical-align:top;border-top:1px solid #dee2e6}
            .table thead th{vertical-align:bottom;border-bottom:2px solid #dee2e6}
            .table tbody+tbody{border-top:2px solid #dee2e6}
            .table .table{background-color:#fff}
            .row{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}
            </style>
            <div class='header-pdf'>
		    <img src='images/logo.png'>
            <h1>La Maison Du Smartphone
            <br/>Devis N°" . $devi->getId() . "
            <br/>".date("d/m/y")."</h1>
            </div>
            <div class='informations-client-magasin'>
            <h3>La Maison Du Smartphone</h3>
            <p>6 Rue de la Constitution
            <br/>50300 Avranches<br/>
            <br/>SIRET : 850073420
            <br/>Numéro TVA : FR62850073420
            <br/>Téléphone : 02 33 51 88 92</p>
            <br/><br/>
            <div class='client'>
            <b>Mr / Mme</b> " . $devi->getNom() . ' ' . $devi->getPrenom() .
            "<br/><b>Email</b> : " . $devi->getEmail() .
            "<br/><b>Téléphone</b> : " . $devi->getTelephone() .

                "
            </div>
            </div>
            <br/><br/><br/><br/><br/><br/><br/><br/>
            <b>Téléphone : ". $devi->getMarque() .' '. $devi->getModele() .
            "</b>
            <table class='table'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Prestation</th>
      <th scope='col'>Quantité</th>
      <th scope='col'>Prix HT (en euros)</th>
      <th scope='col'>Prix TTC (en euros)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope='row'>N°1</th>
      <td>".$prestation1."</td>
      <td>".$quantite1."</td>
      <td>".$prix1HT."</td>
      <td>".$prix1."</td>
    </tr>
    <tr>
      <th scope='row'>N°2</th>
      <td>".$prestation2."</td>
      <td>".$quantite2."</td>
      <td>".$prix2HT."</td>
      <td>".$prix2."</td>
    </tr>
    <tr>
      <th scope='row'>N°3</th>
      <td>".$prestation3."</td>
      <td>".$quantite3."</td>
      <td>".$prix3HT."</td>
      <td>".$prix3."</td>
    </tr>
    <tr>
    <th scope='row'></th>
    <td> </td>
    <td>Sous-Total HT</td>
    <td>".$sousTotalHT." €</td>
    <td> </td>
    </tr>
    <tr>
    <th scope='row'></th>
    <td> </td>
    <td> </td>
    <td>Réduction</td>
    <td>-".$reductionDevis." €</td> 
    </tr>
    <tr>
    <th scope='row'></th>
    <td> </td>
    <td> </td>
    <td>Total TTC<br/>dont TVA (20%)</td>
    <td>".$totalTTC." €<br/>".$dontTva." €</td>
    </tr>
  </tbody>
</table>
<b>Bon pour accord
<br/>Signature :</b>";
            $dompdf->loadHtml($html);

            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $filename = "Devis-".$devi->getId()."-".$devi->getNom()."-".$devi->getPrenom();
            // $dompdf->stream('devis-reponse/' . $filename . '.pdf', [
            // "Attachment" => true,
            // ])
            file_put_contents('devis-reponse/' . $filename . '.pdf', $dompdf->output());
            return $this->redirectToRoute('envoyer-mail',[
                'nom' => $devi->getNom(),
                'prenom' => $devi->getPrenom(),
                'email' => $devi->getEmail(),
                'totalTTC' => $totalTTC,
                'filename' => $filename,
                'id' => $devi->getId(),
            ]);

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
        if ($this->isCsrfTokenValid('delete' . $devi->getId(), $request->request->get('_token'))) {
            $entityManager->remove($devi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('devis_admin_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/{id}/changeStatus", name="devis_admin_changestatus", methods={"GET", "POST"})
     */
    public function changeStatus(Request $request, Devis $devi, EntityManagerInterface $entityManager): Response
    {
      
        $status = $devi->getStatus();
        
        if ($status == "Nouveau-Devis"){
            $devi->setStatus("En-cours");
        }
        elseif ($status == "En-cours"){
            $devi->setStatus("Nouveau-Devis");
        } else {
            $devi->setStatus("Nouveau-Devis");
        }
        

        $entityManager->flush();

        return $this->redirectToRoute('devis_admin_index', [], Response::HTTP_SEE_OTHER);
        

    }
}
