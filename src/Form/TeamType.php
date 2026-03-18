<?php

namespace App\Form;

use App\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom'])
            ->add('fullTeamName', TextType::class, ['label' => 'Nom complet de l\'écurie', 'required' => false])
            ->add('country', TextType::class, ['label' => 'Pays'])
            ->add('Base', TextType::class, ['label' => 'Siège', 'required' => false])
            ->add('TeamChief', TextType::class, ['label' => 'Directeur d\'écurie', 'required' => false])
            ->add('TechnicalChief', TextType::class, ['label' => 'Directeur technique', 'required' => false])
            ->add('Chassis', TextType::class, ['label' => 'Châssis', 'required' => false])
            ->add('PowerUnit', TextType::class, ['label' => 'Moteur', 'required' => false])
            ->add('ReserveDriver', TextType::class, ['label' => 'Pilote de réserve', 'required' => false])
            ->add('FirstTeamEntry', TextType::class, ['label' => 'Première participation', 'required' => false])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
                'attr' => ['rows' => 4],
            ])
            ->add('logo', TextType::class, ['label' => 'Logo (URL)', 'required' => false])
            ->add('carImage', TextType::class, ['label' => 'Image voiture (URL)', 'required' => false])
            ->add('imageBiography', TextType::class, ['label' => 'Image biographie (URL)', 'required' => false])
            ->add('footerImage', TextType::class, ['label' => 'Image footer (URL)', 'required' => false])
            ->add('backgroundColor', ColorType::class, ['label' => 'Couleur de fond', 'required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}
