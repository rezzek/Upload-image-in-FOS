<?php

namespace Register\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //parent::buildForm($builder, $options);
         $builder
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle',
                'attr'  => array('class' =>'form-control' , 'id' =>'username', 'placeholder' =>'Email')))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle',
                 'attr'  => array('class' =>'form-control' , 'id' =>'username', 'placeholder' =>'Nom')))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle',  'attr'  => array('class' =>'form-control' , 'id' =>'username', 'placeholder' =>'Password')),

                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            
        ;

        // add your custom field
       
 $builder->add('description', 'textarea', array('label' => 'Description :',
                'attr'  => array('class' =>'form-control' , 'id' =>'username', 'placeholder' =>'Description')));
          $builder->add('file','file');

    }

    public function getName()
    {
        return 'register_user_registration';
    }
}