<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DeliveryDetaillType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('noOfOrders')
            ->add('averagePrice')
            ->add('minimumOrder')           
            ->add('dailySubscription')
            ->add('weeklySubscription')
            ->add('monthlySubscription')
            ->add('dailySubscriptionNoOfOrders',null,array('label' => 'no Of Orders','required'    => false,))
            ->add('weeklySubscriptionNoOfOrders',null,array('label' => 'no Of Orders','required'    => false,))
            ->add('monthlySubscriptionNoOfOrders',null,array('label' => 'no Of Orders','required'    => false,))
            ->add('city', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'City',
            		'choices' => array(
                                        'Bangalore'=>1,
                                        'Mumbai'=>2,
                                        'Delhi'=>3,
				            		),
            		'required'    => true,
            ))
            ->add('note','choice',array('attr' => array('rows' => '2'),
            						'required'  => false,
            				))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
   /* public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cup\SiteManagementBundle\Entity\DeliveryDetail'
        ));
    }*/
     /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
        		 'data_class' => 'Cup\SiteManagementBundle\Entity\DeliveryDetail'
        ));
    }

    	/**
     * @return string
     */
    public function getName()
    {
        return 'cup_SiteManagementBundle_delivery_detail';
    }
}
