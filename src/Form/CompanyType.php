<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('companyName', TextType::class, [
                'label' => 'Entreprise',
                ])
            ->add('managerName', TextType::class, [
                'label' => 'Responsable',
                ])
            ->add('categoryCompany')
            ->add('mail', TextType::class, [
                'label' => 'Email',
                ])
            ->add('comment', TextType::class, [
                'label' => 'Commentaire',
                ])
            ->add('events', TextType::class, [
                'label' => 'Evènements',
                ])
            ->add('services', TextType::class, [
                'label' => 'Services',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
