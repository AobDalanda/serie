<?php

namespace App\Form;

use App\Entity\Serie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('overview', TextareaType::class,
                              ['required'=>false])
            ->add('status',ChoiceType::class,
                              [
                                  'choices'=>[
                                      'Canceled'=>'canceled',
                                      'Ended'=>'enced',
                                      'Returning'=>'returning'
                                  ]
                              ])
            ->add('vote')
            ->add('popularity')
            ->add('genres',ChoiceType::class,
                             [
                                'choices'=>[
                                    'Drama'=>'drama',
                                    'Sf'=>'sf',
                                    'Romance'=>'romance',
                                    'Western'=>'wester'
                                ]
                             ])
            ->add('firstAirDate', DateType::class,
                             [
                                 'html5'=>true,
                                 'widget'=>'single_text'
                             ])
            ->add('lastAirDate', DateType::class)
            ->add('backdrop')
            ->add('poster')
            ->add('tmdbId')
            //->add('dateCreated')
            //->add('dateModified')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Serie::class,
        ]);
    }
}
