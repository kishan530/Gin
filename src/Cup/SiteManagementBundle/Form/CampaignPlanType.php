<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CampaignPlanType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('planType', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'Plan Type',
            		'choices' => array(
                                        'Multiple City'=>'Multiple City',
                                        'Single City'=>'Single City',
				            		),
            		'required'    => true,
            ))
            ->add('promotionType', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'Promotion Type',
            		'choices' => array(
                                        'Cup Campaign'=>'Cup Campaign',
                                        'Flyer Promotion'=>'Flyer Promotion',
				            		),
            		'required'    => true,
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
        return 'cup_sitemanagementbundle_campaign_plan';
    }
}
