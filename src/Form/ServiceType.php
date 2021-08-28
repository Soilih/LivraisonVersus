<?php

namespace App\Form;

use App\Entity\Service;
use App\Entity\TypeService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Entity\File;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeService' , EntityType::class , [
                'class'=>TypeService::class , 
                'choice_label'=>'libelle'
            ])
            ->add('detail' , TextareaType::class)
            ->add('conditionVente' , TextareaType::class)
            ->add('moyenTransport' , choiceType::class , [
               'choices' => [
                     'oui' => 'oui',
                     'non'=>"non"
                    
                 ],
            ])
        
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
