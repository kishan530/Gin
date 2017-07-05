<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\Event\DataEvent;
/**
 * This is a Form to Search the booking data
 */
class ContactSearchType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('from','date',array(
            		'widget'=> 'single_text',
            		'format'=>'d/M/y',
            		'required'    => true,
            		'label'     => 'From Date',
            		'attr' => array('data-date-format' => 'dd/mm/yyyy')
            		
            				))
            				
            ->add('to','date',array(
            		'widget'=> 'single_text',
            		'format'=>'d/M/y',
            		'required'    => true,
            		'label'     => 'To Date',
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
            'data_class' => 'Cup\SiteManagementBundle\DTO\ContactSearchDto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_sitemanagementbundle_contactsearch';
    }
}