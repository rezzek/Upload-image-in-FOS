<?php

namespace Register\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileFormType extends BaseType
{

    public function getName()
    {
        return 'register_user_profile';
    }

    protected function buildUserForm(FormBuilderInterface $builder, array $options)
    {
       

       
        
        parent::buildUserForm($builder, $options);
        

        $builder->add('current_password', 'password', array(
            'label' => 'form.current_password',
            'translation_domain' => 'FOSUserBundle', 'attr'  => array('class' =>'form-control' , 'id' =>'username', 'placeholder' =>'ActualPassword'),
            'mapped' => false,
           
        ));
        $builder->add('description', 'textarea', array('label' => 'Description :',
                'attr'  => array('class' =>'form-control' , 'id' =>'username', 'placeholder' =>'Description')));
         $builder->add('file','file');
    }
}
        
