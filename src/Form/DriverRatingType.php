<?php

namespace App\Form;

use App\Entity\Driver;
use App\Entity\DriverRating;
use App\Entity\Game;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DriverRatingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('driver', EntityType::class, [
                'class' => Driver::class,
                'choice_label' => fn(Driver $d) => $d->getFirstName() . ' ' . $d->getLastName(),
                'label' => 'Pilote',
                'placeholder' => '— Sélectionner un pilote —',
            ])
            ->add('game', EntityType::class, [
                'class' => Game::class,
                'choice_label' => 'title',
                'label' => 'Grand Prix',
                'placeholder' => '— Sélectionner un Grand Prix —',
            ])
            ->add('overall', IntegerType::class, ['label' => 'Overall (0-100)'])
            ->add('pace', IntegerType::class, ['label' => 'Pace (0-100)'])
            ->add('experience', IntegerType::class, ['label' => 'Experience (0-100)'])
            ->add('racecraft', IntegerType::class, ['label' => 'Racecraft (0-100)'])
            ->add('awareness', IntegerType::class, ['label' => 'Awareness (0-100)'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DriverRating::class,
        ]);
    }
}
