<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OurClientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('clientName', null, array(
            		'required'    => true,
            		'label' => 'ClientName', ))
        			
        	->add('subject', null, array(
            		'required'    => true,
            		'label' => 'Subject', ))
            		
            ->add('description', null, array(
            		'required'    => true,
            		'label' => 'Description', ))
            		
            ->add('storyTitle', null, array(
            		'required'    => true,
            		'label' => 'StoryTitle', ))
            		
            ->add('storyDescription', null, array(
            		'required'    => true,
            		'label' => 'StoryDescription', ))
            		
            //->add('clientImage')
            ->add('clientImage', 'file',array(
            		'required' => false,
            		'attr'   =>  array(
            				'class'   => 'filestyle',
            				'data-icon'   => 'false',
            				'label' => 'ClientImage',
            		),
            		))
            //->add('storyImage')
            ->add('storyImage', 'file',array(
            				'required' => false,
            				'attr'   =>  array(
            						'class'   => 'filestyle',
            						'data-icon'   => 'false',
            						'label' => 'StoryImage',
            				),
            		))
            //->add('active')
            ->add('active', 'checkbox', array(
            		'label'    => 'active',
            		'required' => false,
            		'label' => 'Status',
            ));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cup\SiteManagementBundle\Dto\OurClientDto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_sitemanagementbundle_ourclient';
    }
}
