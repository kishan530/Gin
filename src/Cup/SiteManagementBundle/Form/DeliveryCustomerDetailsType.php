<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DeliveryCustomerDetailsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sexRatio',null,array('label' => 'Male to Female Ratio',))
            ->add('marriedToBachelorRatio')
            ->add('ageGroup', 'choice', array(
            		'expanded' => true,
            		'multiple' => true,
                    'label' => 'Age Group',
            		'choices' => array(
                                        '20-40'=>'20-40',
                                        '40-50'=>'40-50',
                                        '50-60'=>'50-60',
				            		),
            		'required'    => true,
            ))
            ->add('incomeGroup', 'choice', array(
            		'expanded' => true,
            		'multiple' => true,
                    'label' => 'Income Group',
            		'choices' => array(
                                        'Very High Income'=>'Very High Income',
                                        'High and Moderate'=>'High and Moderate',
                                        'Low Income'=>'Low Income',
                                        'Cannot Defined'=>'Cannot Defined',
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
            'data_class' => 'Cup\SiteManagementBundle\Entity\DeliveryCustomerDetails'
        ));
    }
	/**
     * @return string
     */
    public function getName()
    {
        return 'cup_SiteManagementBundle_customer';
    }
}
