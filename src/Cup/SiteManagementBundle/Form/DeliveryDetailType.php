<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeliveryDetailType extends AbstractType
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
            ->add('dailySubscription',null,array('required'    => false,))
            ->add('weeklySubscription',null,array('required'    => false,))
            ->add('monthlySubscription',null,array('required'    => false,))
            ->add('dailySubscriptionNoOfOrders',null,array('label' => 'no Of Orders','required'    => false,))
            ->add('weeklySubscriptionNoOfOrders',null,array('label' => 'no Of Orders','required'    => false,))
            ->add('monthlySubscriptionNoOfOrders',null,array('label' => 'no Of Orders','required'    => false,))
            ->add('city', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'City',
            		'choices' => array(
                                        1=>'Bangalore',
                                        2=>'Mumbai',
                                        3=>'Delhi',
				            		),
            		'required'    => true,
            ))
            ->add('note','textarea',array('attr' => array('rows' => '2'),
            						'required'  => false,
            				))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
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
        return 'cup_sitemanagementbundle_deliverydetail';
    }
}
