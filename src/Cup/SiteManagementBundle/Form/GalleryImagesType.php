<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GalleryImagesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	
           ->add('imagePath', 'file',array(
            		'required' => false,
            			'attr'   =>  array(
            				'class'   => 'filestyle',
            					'data-icon'   => 'false',
            				'label' => 'ImagePath',
            				),
            		))
            		
        ->add('name', null, array(
            				'required'    => true,
            				'attr'   =>  array(
            				'Placeholder' => 'alt text',
            				),
            		 ))
            		
        
             ;
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cup\SiteManagementBundle\Dto\GalleryImagesDto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_sitemanagementbundle_galleryimages';
    }
}
