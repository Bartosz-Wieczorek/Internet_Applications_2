<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\Date;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class,['widget' => 'single_text'])
            ->add('celsius', NumberType::class,[
                'scale' => 0,
                'input' => 'string',
                'html5' => true,
                'attr' => ['step' => 'any'],
                ])
            ->add('precipitation', NumberType::class,[
                'scale' => 1,
                'input' => 'string',
                'html5' => true,
                'attr' => ['step' => 'any'],
            ])
            ->add('windSpeed', NumberType::class,[
                'scale' => 1,
                'input' => 'string',
                'html5' => true,
                'attr' => ['step' => 'any'],
            ])
            ->add('pressure', null)
            ->add('humidity', null)
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'city',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
