<?php

namespace App\Form;

use App\Entity\Vehicule;
use App\Entity\TypeVehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque' , TextType::class)
            ->add('volume' , TextType::class)
            ->add('puissance' , TextType::class)
            ->add('detail' , TextareaType::class)
            ->add('etat' , ChoiceType::class , [
              'choices' => [
                          'noeuve' => 'noeuve',
                          'ocasion'=>"ocasion" ],
               ])
            ->add('modele' , TextType::class)
            ->add('matricule' , TextType::class)
            ->add('kilometrage' , TextType::class)
            ->add('galerie' ,  FileType::class,[
                'label' => 'Inserer un ou plusieurs images',
                'multiple' => true,
                'mapped' => false,
                'required' => false , 
            ])
            ->add('typevehicule' , EntityType::class , [
                'class' => TypeVehicule::class, 
                'choice_label'=>'libelle'
            ])
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
