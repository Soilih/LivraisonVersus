<?php

namespace App\Form;

use App\Entity\Planning;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('heureDebut' , TimeType::class , [
                'attr' => ['id' => 'h_start']
            ])
            ->add('HeureFin' , TimeType::class)
            ->add('jourDebut' , TextType::class)
            ->add('jourFin' , TextType::class)
            ->add('detail' , TextareaType::class)
            ->add('type' , ChoiceType::class , [
                'label' => 'selectionner le type de planning',
                'choices' => [
                     'matin' => 'matin',
                     'après-midi' => "après-midi",
                     'soir'=>"3"
                    
                 ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Planning::class,
        ]);
    }
}
