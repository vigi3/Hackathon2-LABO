<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameEvent', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('dateEvent', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de l\'évènement',
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
            ])
            ->add('Companies', TextType::class, [
                'label' => 'Entreprises',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
