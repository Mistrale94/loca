<?php

namespace App\Form;

use App\Entity\Circuit;
use App\Entity\Filter;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CircuitType extends AbstractType
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
            ->add('title',TextType::class,['label'=>'Titre',])
            ->add('locality',TextType::class,['label'=>'Lieu',])
            ->add('content',TextType::class,['label'=>'Contenu',])
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
            ->add('stage',TextType::class,['label'=>'Etapes',])
            ->add('relationship',TextType::class,['label'=>'Relation',])
            ->add('duration',TextType::class,['label'=>'Durée',])
            ->add('price',TextType::class,['label'=>'Prix',])
            ->add('full_content',TextType::class,['label'=>'Contenu global',])
            ->add('destination',TextType::class,['label'=>'Destination',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Circuit::class,
        ]);
    }
}
