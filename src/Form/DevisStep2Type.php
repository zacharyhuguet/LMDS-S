<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\Marque;
use App\Repository\MarqueRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DevisStep2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('marque', EntityType::class, array(
            'class' => Marque::class,
            'choice_label' => 'nom_marque',
            'placeholder' => '=== Choisir une marque ===',
        ));
        
        $builder->add('Etape_suivante', SubmitType::class);   
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Devis::class,
        ]);
    }
}
