<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2018-12-04
 * Time: 11:21
 */

namespace AppBundle\Form\Type;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pizza', EntityType::class,
                [
                    'class' => 'Produits.php',
                    'choice_label' => 'name'
                ]
            )
            ->add('snack', EntityType::class,
                [
                    'class' => 'AppBundle:Snack',
                    'choice_label' => 'name'
                ]
            )
            ->add('verifTranche', EntityType::class,
                [
                    'class' => 'AppBundle:Commande',
                    'choice_label' => 'date'
                ]
            )
            ->add('submit', SubmitType::class, ['label' => 'Enregistrer la commande']);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Commande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_Commande';
    }
}