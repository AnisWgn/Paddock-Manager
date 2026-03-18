<?php

namespace App\Form;

use App\Entity\Driver;
use App\Entity\Team;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DriverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, ['label' => 'Prénom'])
            ->add('lastName', TextType::class, ['label' => 'Nom'])
            ->add('nationality', TextType::class, ['label' => 'Nationalité'])
            ->add('birthDate', DateType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text',
            ])
            ->add('number', IntegerType::class, ['label' => 'Numéro'])
            ->add('code', TextType::class, ['label' => 'Code (3 lettres)'])
            ->add('photo', TextType::class, ['label' => 'Photo (URL)', 'required' => false])
            ->add('imageBiography', TextType::class, ['label' => 'Image biographie (URL)', 'required' => false])
            ->add('description', TextareaType::class, [
                'label' => 'Description / Biographie',
                'required' => false,
                'attr' => ['rows' => 6],
            ])
            ->add('quotes', TextType::class, [
                'label' => 'Citation',
                'required' => false,
            ])
            ->add('quotesFrom', TextType::class, [
                'label' => 'Source de la citation',
                'required' => false,
            ])
            ->add('footerImage', TextType::class, [
                'label' => 'Image footer (URL)',
                'required' => false,
            ])
            ->add('isAlive', CheckboxType::class, ['label' => 'En vie', 'required' => false])
            ->add('isRetired', CheckboxType::class, ['label' => 'Retraité', 'required' => false])
            ->add('team', EntityType::class, [
                'class' => Team::class,
                'choice_label' => 'name',
                'label' => 'Écurie',
                'placeholder' => '— Sélectionner une écurie —',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Driver::class,
        ]);
    }
}
