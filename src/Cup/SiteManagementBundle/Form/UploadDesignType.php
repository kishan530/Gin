<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UploadDesignType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('design', 'file',array(
        		'required' => false,
        		'data_class' => null,
        		'multiple'=> true,
        		'attr'   =>  array(
        				'class'   => 'filestyle',
        				'data-icon'   => 'false'
        				
        				
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
            'data_class' => 'Cup\SiteManagementBundle\Entity\CampaignRequest'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_sitemanagementbundle_campaign_design';
    }
}
