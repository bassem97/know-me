<?php

namespace App\Form;
use App\Entity\User;
use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content',TextType::class,['required' => true])
            ->add('type',ChoiceType::class,[
                'choices' =>[
                    'spam'=>'spam',
                    'abuse'=>'abuse'
                ]
            ])
            ->add('sentBy', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id', ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
