<?php

namespace App\Form;

use App\Entity\Fly;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('location')
            ->add('date')
            ->add('altitude_from')
            ->add('altitude_to')
            ->add('time')
            ->add('comment')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fly::class,
        ]);
    }
}
