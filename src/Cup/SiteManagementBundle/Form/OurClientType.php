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
        	->add('clientName')
        	->add('subject')
            ->add('description')
            ->add('storyTitle')
            ->add('storyDescription')
            //->add('clientImage')
            ->add('clientImage', 'file',array(
            		'required' => false,
            		'attr'   =>  array(
            				'class'   => 'filestyle',
            				'data-icon'   => 'false'
            		),
            		))
            //->add('storyImage')
            ->add('storyImage', 'file',array(
            				'required' => false,
            				'attr'   =>  array(
            						'class'   => 'filestyle',
            						'data-icon'   => 'false'
            				),
            		))
            //->add('active')
            ->add('active', 'checkbox', array(
            		'label'    => 'active',
            		'required' => false,
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
