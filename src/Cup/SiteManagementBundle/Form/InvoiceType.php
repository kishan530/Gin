<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Cup\SiteManagementBundle\Form\InvoiceItemType;

class InvoiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('invoiceTitle')
            ->add('modePayment')
             ->add('invoiceDate','date',array(
          		'widget'=> 'single_text',
          		'format'=>'d/M/y',
          		'required'    => false,
             	'attr' => array('data-date-format' => 'dd/mm/yyyy','class'=>'date-picker')
            ))
            ->add('deliveryNote',null, array(
    				'required'  => false,
    		))
             ->add('deliveryNoteDate','date',array(
          		'widget'=> 'single_text',
          		'format'=>'d/M/y',
          		'required'    => false,
             	'attr' => array('data-date-format' => 'dd/mm/yyyy','class'=>'date-picker')
            ))
            ->add('supplierRef',null, array(
    				'required'  => false,
    		))
            ->add('otherRef',null, array(
    				'required'  => false,
    		))
            ->add('sellerName')
            ->add('sellerAddress',null, array(
    				'label'     => 'Seller Address Line1',
    				'required'  => false,
    		))
            ->add('sellerAddress2',null, array(
    				'label'     => 'Seller Address Line2',
    				'required'  => false,
    		))
            ->add('sellerTIN',null, array(
    				'label'     => 'Seller TIN',
    				'required'  => false,
    		))
            ->add('sellerTaxNo',null, array(
    				'label'     => 'Seller Service Tax No',
    				'required'  => false,
    		))
            ->add('sellerPAN',null, array(
    				'label'     => 'Seller PAN',
    				'required'  => false,
    		))
            ->add('buyerName')
            ->add('buyerEmail')
            ->add('buyerAddress',null, array(
    				'label'     => 'Buyer Address Line1',
    				'required'  => false,
    		))
            ->add('buyerAddress2',null, array(
    				'label'     => 'Buyer Address Line2',
    				'required'  => false,
    		))
            ->add('buyerOrderNo',null, array(
    				'required'  => false,
    		))
            ->add('buyerOrderDate','date',array(
          		'widget'=> 'single_text',
          		'format'=>'d/M/y',
          		'required'    => false,
             	'attr' => array('data-date-format' => 'dd/mm/yyyy','class'=>'date-picker')
          ))
            ->add('despatchNo',null, array(
    				'required'  => false,
    		))
            ->add('despatchThrough',null, array(
    				'required'  => false,
    		))
            ->add('destination',null, array(
    				'required'  => false,
    		))
            ->add('termsOfDelivery',null, array(
    				'required'  => false,
    		))
            ->add('serviceTax')
            ->add('swachBharthCess')
            ->add('krishiKalyanCess')
           // ->add('roundingOff')
            ->add('sendMail', 'checkbox', array(
    				'label'     => 'Send Mail to Buyer',
    				'required'  => false,
    		))
            ->add('item', 'collection', array(
                // each entry in the array will be an "InvoiceItem" field
                'type'   => new InvoiceItemType(),
                'allow_add'    => true,
                'prototype'=>true,
                // these options are passed to each "InvoiceItem" type
                //'entry_options'  => array(
                 //   'attr'      => array('class' => '')
                //),
            ))
             ->add('terms', 'collection', array(
                // each entry in the array will be an "InvoiceItem" field
                'type'   => new InvoiceTermType(),
                'allow_add'    => true,
                'prototype'=>true,
                // these options are passed to each "InvoiceItem" type
                //'entry_options'  => array(
                 //   'attr'      => array('class' => '')
                //),
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cup\SiteManagementBundle\Entity\Invoice'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_sitemanagementbundle_invoice';
    }
}
