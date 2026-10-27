<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('city', null,[
                'attr' =>
                    ['placeholder' => 'Enter City name',],
                ])
            ->add('country', ChoiceType::class,['placeholder' => 'Choose a Country','choices'=> [
                'Poland' => 'PL',
                'United States' => 'US',
                'Canada' => 'CA',
                'France' => 'FR',
                'Germany' => 'DE',
                'Spain' => 'ES',
            ],
                ])
            ->add('latitude', NumberType::class, [
                'scale' => 7,
                'input' => 'string',
                'html5' => true,
                'attr' => [
                    'step' => 'any',
                ],
            ])
            ->add('longitude', NumberType::class, [
                'scale' => 7,
                'input' => 'string',
                'html5' => true,
                'attr' => [
                    'step' => 'any',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
