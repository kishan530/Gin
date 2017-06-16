<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DeliveryPartnerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('companyName')
            ->add('industryType')
            ->add('email')
            ->add('phoneNumber')
            ->add('packageDimenson',null,array('required'    => false,))
            ->add('city', 'choice', array(
            		'expanded' => true,
            		'multiple' => true,
                    'label' => 'City',
            		'choices' => array(
                                        1=>'Bangalore',
                                        2=>'Mumbai',
                                        3=>'Delhi',
				            		),
            		'required'    => true,
            ))
            ->add('day', 'choice', array(
            		'expanded' => true,
            		'multiple' => true,
                    'label' => 'Delivery Day',
            		'choices' => array(
                                        'Sunday'=>'Sunday',
                                        'Monday'=>'Monday',
                                        'Tuesday'=>'Tuesday',
                                        'Wedneday'=>'Wedneday',
                                        'Thrusday'=>'Thrusday',
                                        'Friday'=>'Friday',
                                        'Saturday'=>'Saturday',
				            		),
            		'required'    => true,
            ))
            ->add('note','textarea',array('attr' => array('rows' => '7'),
            						'required'  => false,
            				))

        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cup\SiteManagementBundle\Entity\DeliveryPartner'
        ));
    }
	/**
     * @return string
     */
    public function getName()
    {
        return 'cup_SiteManagementBundle_delivery_partner';
    }
}
