<?php
// src/Form/AlternantType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AlternantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('domaine', ChoiceType::class, [
                'choices' => [
                    'Informatique' => 'informatique',
                    'Marketing' => 'marketing',
                    'Ressources Humaines' => 'RH',
                    // Ajoutez d'autres domaines si nécessaire
                ],
                'label' => 'Domaine de recherche',
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville',
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Trouver des entreprises',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Si vous utilisez un entity ou un autre modèle, vous pouvez définir des options ici
        ]);
    }
}
