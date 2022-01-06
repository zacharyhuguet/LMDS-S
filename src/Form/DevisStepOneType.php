<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\Marque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DevisStepOneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Nom *',
                    'pattern' => '[A-za-z- ]*',
                    'minlength' => 2,
                    'maxlength' => 50,
                    'autofocus' => 'autofocus',
                ],
            ]);

        $builder->add('prenom', TextType::class, [
            'attr' => [
                'placeholder' => 'Prénom *',
                'pattern' => '[A-za-z- ]*',
                'minlength' => 2,
                'maxlength' => 50,
            ],
        ]);
        $builder->add('email', EmailType::class, [
            'attr' => [
                'placeholder' => 'Email *',
                'pattern' => '[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})',
                'minlength' => 2,
                'maxlength' => 50,
            ],
        ]);
        $builder->add('telephone', NumberType::class, [
            'attr' => [
                'placeholder' => 'Téléphone *',
                'minlength' => 10,
                'maxlength' => 10,
            ],
        ]);
        /*
        $builder->add('marque', EntityType::class, array(
            'class' => Marque::class,            
            'choice_label' => 'NomMarque',
        ));
        
        $builder->add('marque', EntityType::class, array(
            'class' => Marque::class,
            'query_builder' => function (MarqueRepository $repository) {
                return $repository->createQueryBuilder('m')->orderBy('m.NomMarque', 'ASC');
            },
            'choice_label' => 'NomMarque',
            'multiple' => false,
            'attr' => array('rows' => '10'),
        ));        
        */
        $builder->add('Etape_suivante', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Devis::class,
        ]);
    }
}
