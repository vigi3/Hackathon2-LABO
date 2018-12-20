<?php

namespace App\Form;

use App\Entity\CategoryCompany;
use App\Entity\Company;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('companyName')
            ->add('managerName')
            ->add('categoryCompany', EntityType::class, [
                'class' => CategoryCompany::class,
                'choice_label' => 'name',
                'label' => 'Catégorie',
            ])
            ->add('mail')
            ->add('comment');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
