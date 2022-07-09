<?php

namespace App\Form;

use App\Entity\Circuit;
use App\Entity\Filter;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CircuitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image')
            ->add('title')
            ->add('locality')
            ->add('content')
            ->add('filter', EntityType::class, [
                'class' => Filter::class,
                'multiple' => true,
                'choice_label' => 'name',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('f')
                        ->orderBy('f.name', 'ASC');
                },
                'label' => 'Filtres',
                'attr' => [
                    'class' => 'select-filters'
                ]
            ])
            ->add('stage')
            ->add('relationship')
            ->add('duration')
            ->add('price')
            ->add('full_content')
            ->add('destination')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Circuit::class,
        ]);
    }
}
