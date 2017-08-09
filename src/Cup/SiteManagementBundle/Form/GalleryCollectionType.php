<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Cup\SiteManagementBundle\Form\GalleryImagesType;

class GalleryCollectionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('name', null, array(
            		'required'    => true,
            		'label' => 'Name', ))

           ->add('imagePath', 'file',array(
            		'required' => false,
           				'label' => 'Thumbnail Path',
            			'attr'   =>  array(
            				'class'   => 'filestyle',
            					'data-icon'   => 'false',
            				
            				),
            		))
        
            ->add('bannerImage', 'file',array(
            		'required' => false,
            		'attr'   =>  array(
            				'class'   => 'filestyle',
            				'data-icon'   => 'false',
            				'label' => 'BannerImage',
            		),
            		)) 
            		
            ->add('url', null, array(
            				'required'    => true,
            				'label' => 'URL', ))
            		
            		
            
            ->add('imageList', 'collection', array(
            		// each entry in the array will be an "PackageItinerary" field
            		'type'   => new GalleryImagesType(),
            		'allow_add'    => true,
            		'prototype'=>true,
            		'required'    => false,
            		// these options are passed to each "PackageItinerary" type
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
            'data_class' => 'Cup\SiteManagementBundle\Dto\GalleryCollectionDto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_sitemanagementbundle_gallerycollection';
    }
}
