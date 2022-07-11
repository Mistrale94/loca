<?php

namespace App\Form;

use App\Entity\Discover;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class DiscoverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image',
                'required' => false,
                'data_class' => null,
                'empty_data' => '',
            ])
            ->add('content')
            ->add('created_at')
            ->add('modified_at')
            ->add('circuit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Discover::class,
        ]);
    }
}
