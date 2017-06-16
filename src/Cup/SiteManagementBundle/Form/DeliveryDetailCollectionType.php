<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Cup\SiteManagementBundle\Form\DeliveryDetailType;

class DeliveryDetailCollectionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('deliveryDetail', 'collection', array(
                // each entry in the array will be an "email" field
                'type'   => new DeliveryDetailType(),
                // these options are passed to each "email" type
                //'entry_options'  => array(
                 //   'attr'      => array('class' => 'email-box')
                //),
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
           // 'data_class' => 'Cup\SiteManagementBundle\Entity\DeliveryDetail'
        ));
    }
       	/**
     * @return string
     */
    public function getName()
    {
        return 'cup_SiteManagementBundle_delivery_collection';
    }
}
