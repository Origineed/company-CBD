<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuantityProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('quantity', ChoiceType::class, [
                'choices' => [
                    '1 gramme' => 1,
                    '2 grammes' => 2,
                    '5 grammes' => 5,
                    '10 grammes' => 10,
                    '25 grammes' => 25,
                ],
                'attr'=> [
                    'class'=> 'choiceQuantity'
                ]
            ])
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
