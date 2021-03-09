<?php

namespace App\Form;

use App\Entity\Room;
use App\Entity\User;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('nbpersonne')
            ->add('iduser',EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id', ])
            ->add('idroom',EntityType::class, [
                'class' => Room::class,
                'choice_label' => 'id', ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
