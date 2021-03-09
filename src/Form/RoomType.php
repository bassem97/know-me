<?php

namespace App\Form;

use App\Entity\Room;
use App\Entity\Menu;
use App\Entity\User;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('menu', EntityType::class, ['class'=>Menu::class, 'choice_label' => 'name'])
            ->add('description');
         //  ->add('user', EntityType::class, ['class'=>User::class, 'choice_label' => 'fname'] );

    }
            
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Room::class,
        ]);
    }
}
