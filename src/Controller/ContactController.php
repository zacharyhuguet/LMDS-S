<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(): Response
    {
        $form = $this->createForm(ContactType::class);
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/envoi_mail", name="envoi_mail")
     */
    public function envoiMail(MailerInterface $mailer, Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

            $contact = $form->getData();
            $nom = $contact['nom'];
            $prenom = $contact['prenom'];
            $email = $contact['email'];
            $objet = $contact['objet'];
            $message = $contact['message'];
            $email = (new Email())
                ->from('contact@la-maison-du-smartphone.fr')
                ->to('contact@la-maison-du-smartphone.fr')
                ->priority(Email::PRIORITY_HIGH)
                ->subject($nom .' '. $prenom)
                ->html('<h1>
                           Nom : ' . $nom . '<br/>
                           Prénom : '. $prenom . '<br/>
                           Email : '. $email . '<br/>
                           Objet : '. $objet . '<br/>
                           Message : '. $message . '<br/>
                       </h1>'
                );
            $mailer->send($email);
        return $this->redirectToRoute('contact_send');

    }
    /**
     * @Route("/submit", name="contact_send")
     */
    public function submit(): Response
    {
        return $this->render('contact/envoi_mail.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

}
