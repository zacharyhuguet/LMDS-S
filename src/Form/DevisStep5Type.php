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
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DevisStep5Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('commentaire', TextareaType::class, [
            'attr' => [
                'placeholder' => 'Commentaire (optionnel) - 150 caractères maximum',
                'minlength' => 1,
                'maxlength' => 250,
                'autofocus' => 'autofocus',
                'rows' => 8,
            ], 'required' => false,
            
        ]);
        $builder->add('protection', CheckboxType::class, [
            'required' => false,
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
