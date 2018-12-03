<?php

namespace AppBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PizzaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, ['label' => 'Nom'])
            ->add('base', EntityType::class,
                [
                    'class' => 'AppBundle:Base',
                    'choice_label' => 'type'
                ]
            )
            ->add('ingredients', TextType::class, ['label' => 'Ingredient'])
            ->add('price', TextType::class, ['label' => 'Prix'])
//            ->add('img', FileType::class, ['label' => 'Image'])
            ->add('submit', SubmitType::class, ['label' => 'Enregistrer la pizza']);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Pizza'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_Pizza';
    }
}