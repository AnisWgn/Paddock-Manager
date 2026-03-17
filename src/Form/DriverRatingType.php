<?php

namespace App\Form;

use App\Entity\Driver;
use App\Entity\DriverRating;
use App\Entity\Game;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DriverRatingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('overall')
            ->add('pace')
            ->add('experience')
            ->add('racecraft')
            ->add('awareness')
            ->add('driver', EntityType::class, [
                'class' => Driver::class,
                'choice_label' => 'firstName',
            ])
            ->add('game', EntityType::class, [
                'class' => Game::class,
                'choice_label' => 'title',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DriverRating::class,
        ]);
    }
}
