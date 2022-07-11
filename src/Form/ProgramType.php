<?php

namespace App\Form;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use App\Entity\Program;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', CKEditorType::class, [
                'config' => array(
                    'uiColor' => '#FFFFFF',
                    'toolbar' => 'standard',
                ),
            ])
            ->add('created_at')
            ->add('modified_at')
            ->add('circuit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}
