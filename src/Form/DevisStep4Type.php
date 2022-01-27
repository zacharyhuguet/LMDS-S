<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Probleme;
use App\Form\DevisStep3Type;
use App\Repository\MarqueRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DevisStep4Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('probleme1', EntityType::class, array(
            'class' => Probleme::class,
            'choice_label' => 'nom_probleme',
            'placeholder' => '=== Choisir un problème ===',
            'required' => false,
            'choice_value' => 'nom_probleme',
            
        ));
        $builder->add('probleme2', EntityType::class, array(
            'class' => Probleme::class,
            'choice_label' => 'nom_probleme',
            'placeholder' => '=== Laissez vide si pas de 2ème problème ===',
            'required' => false,
            'choice_value' => 'nom_probleme',
        ));
        $builder->add('probleme3', TextType::class, [
            'attr' => [
                'placeholder' => '=== Autre problème (Pas dans la liste ci-dessus) ===',
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
