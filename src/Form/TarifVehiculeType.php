<?php

namespace App\Form;

use App\Entity\TarifVehicule;
use App\Entity\TypeTarif;
use App\Entity\Vehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TarifVehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prix' , NumberType::class)
            ->add('typeTarif' , EntityType::class , [
                'class'=>TypeTarif::class , 
                'choice_label'=>'libelle'

            ])
            ->add('vehicule'   , EntityType::class , [
                'class'=>Vehicule::class , 
                'choice_label'=>'modele'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TarifVehicule::class,
        ]);
    }
}
