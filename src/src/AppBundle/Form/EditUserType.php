<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EditUserType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('username');
        $builder->add('first_name');
        $builder->add('last_name');
        $builder->add('email');
        $builder->add('roles', ChoiceType::class,
                array(
                    'label' => false,
                    'choices' => array(
                        'empty'=>'',
                        'Admin'=>'ROLE_ADMIN',
                        'Boss' => 'ROLE_BOSS',
                        'Team' => 'ROLE_TEAM',
                        'Worker' => 'ROLE_WORKER',
                        'Trainee' => 'ROLE_TRAINEE'
                    ),
                    'multiple' => true
                )
        );

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
        ));
    }

}