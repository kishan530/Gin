<?php

namespace Cup\SecurityBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
/**
 * This is a Form to collect the data of RegistrationForm to remove username in
 * Bro application.
 */
class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
       // $builder->add('name');
	    $builder->remove('username');  // we use email as the username
		
      
    }

    public function getName()
    {
        return 'cup_user_registration';
    }
}