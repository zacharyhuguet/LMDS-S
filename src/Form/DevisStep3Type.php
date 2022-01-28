<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Form\DevisStep3Type;
use App\Repository\MarqueRepository;
use App\Repository\ModeleRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DevisStep3Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder>add('modele', EntityType::class, array(
                'class' => Modele::class,
                'choice_label' => 'nom_modele',
                'placeholder' => '=== Choisir un modèle ===',
                'choice_value' => 'nom_modele',
                'query_builder' => function (ModeleRepository $modele) use($options){
                    return $modele->createQueryBuilder('m')
                        ->Where('m.marque = :marque')
                        ->setParameter('marque', $options['marque'])
                        ;
                },
            ))->add('Etape_suivante', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Devis::class,
        ]);
    }
}
