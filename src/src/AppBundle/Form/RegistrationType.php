<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('first_name');
        $builder->add('last_name');
        $builder->add('roles', CollectionType::class, array(
            'entry_type' => ChoiceType::class,
            'entry_options' => array(
                'label' => false,
                'choices' => array(
                    #'Boss' => 'ROLE_BOSS',
                    'Team' => 'ROLE_TEAM',
                    'Worker' => 'ROLE_WORKER',
                    'Trainee' => 'ROLE_TRAINEE'
                    )
                )
            )
        );
    }

    public function getParent(){
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix(){
        return 'app_user_registration';
    }

    public function getName(){return $this->getBlockPrefix();}
}