<?php

namespace App\Form;

use App\Entity\Producer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProducerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image',
            ])
            ->add('name')
            ->add('product')
            ->add('content')
            ->add('created_at')
            ->add('modified_at')
            ->add('circuit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Producer::class,
        ]);
    }
}
