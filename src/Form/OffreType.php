<?php
// src/Form/OffreType.php

namespace App\Form;

use App\Entity\Offre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, ['label' => 'Titre'])
            ->add('poste', TextType::class, ['label' => 'Poste'])
            ->add('niveauEtude', TextType::class, ['label' => 'Niveau d\'étude requis'])
            ->add('duree', TextType::class, ['label' => 'Durée de l\'alternance'])
            ->add('attentes', TextareaType::class, ['label' => 'Attentes'])
            ->add('description', TextareaType::class, ['label' => 'Description']);
            }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class, // Associe le formulaire à l'entité Offre
        ]);
    }
}
