<?php

namespace App\Form;

use App\Entity\NFT;
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
            ->add('images', CollectionType::class, [
                'entry_type'=> ImageType::class,
                'label'=> 'NFT',
                'prototype_name' => '__images__',
                'allow_add' =>true,
                'by_reference' =>false,
                'entry_options' => ['label' => false],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NFT::class,
        ]);
    }
}
