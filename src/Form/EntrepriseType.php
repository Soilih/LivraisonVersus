<?php

namespace App\Form;
use App\Entity\Pays;
use App\Entity\Entreprise;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre' , TextType::class)
            ->add('nom' , TextType::class)
            ->add('prenom' , TextType::class)
            ->add('telephone' , TelType::class)
            ->add('email' , EmailType::class)
            ->add('adresse' , TextType::class)
            ->add('codeNaf' , TextType::class)
            ->add('detail' , TextareaType::class)
            ->add('logo' , FileType::class , array('data_class' => null,'required' => false))
            ->add('site' , TextType::class)
            ->add('Apropos' , TextareaType::class)
            ->add('postal' , NumberType::class)
            ->add('pays' , EntityType::class , [
                'class'=>Pays::class , 
                'choice_label'=>'libelle'
            ])
      
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
