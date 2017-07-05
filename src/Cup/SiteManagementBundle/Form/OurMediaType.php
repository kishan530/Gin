<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OurMediaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('mediaName', null, array(
            		'required'    => true,
            		'label' => 'MediaName', ))
        			
        	->add('newsSubject', null, array(
            		'required'    => true,
            		'label' => 'NewsSubject', ))
            		
            ->add('newsDescription', null, array(
            		'required'    => true,
            		'label' => 'NewsDescription', ))
            		
            ->add('newsDescription', null, array(
            				'required'    => true,
            				'label' => 'NewsDescription', ))
            				
          	->add('newsTitle', null, array(
            						'required'    => true,
            						'label' => 'NewsTitle', ))
           	
           	->add('newsLink', null, array(
            								'required'    => true,
            								'label' => 'NewsLink', ))
            
            ->add('mediaLogo', 'file',array(
            		'required' => false,
            		'attr'   =>  array(
            				'class'   => 'filestyle',
            				'data-icon'   => 'false',
            				'label' => 'MediaLogo',
            		),
            		)) ;
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cup\SiteManagementBundle\Dto\OurMediaDto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_sitemanagementbundle_ourmedia';
    }
}
