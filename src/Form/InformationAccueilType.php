<?php

namespace App\Form;

use App\Entity\FontAwesome;
use App\Entity\InformationAccueil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformationAccueilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('emplacement')
            ->add('titre')
            ->add('texte')
            ->add('logo', EntityType::class, array(
                'class' => FontAwesome::class,
                'choice_label' => 'nom',
                'choice_value' => 'nom'
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InformationAccueil::class,
        ]);
    }
}
