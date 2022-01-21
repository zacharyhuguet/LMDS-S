<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\Marque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DevisStep1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre nom *',
                    'pattern' => '[A-za-z- ]*',
                    'minlength' => 2,
                    'maxlength' => 50,
                    'autofocus' => 'autofocus',
                ],
            ]);

        $builder->add('prenom', TextType::class, [
            'attr' => [
                'placeholder' => 'Votre prénom *',
                'pattern' => '[A-za-z- ]*',
                'minlength' => 2,
                'maxlength' => 50,
            ],
        ]);
        $builder->add('email', EmailType::class, [
            'attr' => [
                'placeholder' => 'Votre email *',
                'pattern' => '[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})',
                'minlength' => 2,
                'maxlength' => 50,
            ],
        ]);
        $builder->add('telephone', TelType::class, [
            'attr' => [
                'placeholder' => 'Votre téléphone *',
                'pattern' => '(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}',
                'minlength' => 10,
                'maxlength' => 14,
            ],
        ]);

        $builder->add('Etape_suivante', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Devis::class,
        ]);
    }
}
