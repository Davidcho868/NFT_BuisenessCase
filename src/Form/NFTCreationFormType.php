<?php

namespace App\Form;


use App\Entity\NFT;

use App\Form\CategorieType;
use App\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NFTCreationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('valeur', TextType::class, [
                'label' => 'Valeur en Euros'
            ])
            ->add('prix', TextType::class, [
                'label'=>'Prix en ETH',
            ])
            ->add('is_vente', CheckboxType::class, [
                'label' => 'En vente',
            ])
            ->add('categories', CollectionType::class, [
                'entry_type'     => CategorieType::class,
                'entry_options'  => [
                    'label' => false,
                ],
                'prototype_name' => 'categories',
                'label'          => false,
                'allow_add'      => true,
                'allow_delete'   => true,
                // 'multiple' => true,
                // 'expended' => true,
                'by_reference'   => false,
            ])
            
            ->add('images', ImageType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NFT::class,
        ]);
    }
}
