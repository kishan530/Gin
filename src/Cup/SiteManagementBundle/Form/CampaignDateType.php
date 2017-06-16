<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CampaignDateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('campaignDate','date',array(
          		'widget'=> 'single_text',
          		'format'=>'d/M/y',
          		'required'    => false,
             	'attr' => array('data-date-format' => 'dd/mm/yyyy')
          ))
        ->add('campaignEndDate','date',array(
          		'widget'=> 'single_text',
          		'format'=>'d/M/y',
          		'required'    => false,
               'read_only' => true,
             	'attr' => array('data-date-format' => 'dd/mm/yyyy')
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
        return 'cup_sitemanagementbundle_campaign_date';
    }
}
