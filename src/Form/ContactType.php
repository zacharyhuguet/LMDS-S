<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('nom', TextType::class, [
            'attr' => [
                'placeholder' => 'Votre nom *',
                'minlength' => 2,
                'maxlength' => 50,
                'autofocus' => 'autofocus',
            ],
        ]);

    $builder->add('prenom', TextType::class, [
        'attr' => [
            'placeholder' => 'Votre prénom *',
            'minlength' => 2,
            'maxlength' => 50,
        ],
    ]);
    $builder->add('email', EmailType::class, [
        'attr' => [
            'placeholder' => 'Votre email *',
            'pattern' => '[A-Za-z0-9](([_.-]?[a-zA-Z0-9]+))@([A-Za-z0-9]+)(([_.-]?[a-zA-Z0-9]+)*).([A-Za-z]{2,})',
            'minlength' => 2,
            'maxlength' => 50,
        ],
    ]);
    $builder->add('objet', TextType::class, [
        'attr' => [
            'placeholder' => 'Objet du message *',
            'minlength' => 2,
            'maxlength' => 50,
        ],
    ]);
    $builder->add('message', TextareaType::class, [
        'attr' => [
            'placeholder' => 'Saisir votre message *',
            'minlength' => 2,
            'maxlength' => 250,
        ],
    ]);


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
