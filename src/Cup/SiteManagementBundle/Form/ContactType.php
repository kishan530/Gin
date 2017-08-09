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
 * This is a Form to collect the data of contact
 */
class ContactType extends AbstractType
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
            		'label' => '',
            ))
            				
            ->add('mobile',null,array(
            		                
            						'required'    => false,
            						'label' => '',
				            	        						
            				))
            				
            ->add('email',null ,array(
            		                
            						'required'    => true,
            						'label' => '',
            						
            				))
            
            				
            ->add('message','textarea',array('attr' => array('rows' => '7'),
            						'required'  => true,
            				))
            				
            				->add('numberOfEmployees',null,array(
            				
            						'required'    => false,
            						'label' => '',
            						 
            				))
            				
            				->add('city',null,array(
            				
            						'required'    => false,
            						'label' => '',
            						 
            				))
            				
            				->add('numberOfCups',null,array(
            				
            						'required'    => false,
            						'label' => '',
            						 
            				))
            				
            ->add('advertiseType', 'choice', array(
            						'expanded' => true,
            						'multiple' => false,
            						'label' => '',
            						'choices' => array(
            								'Get Free Cups'=>'Get Free Cups',
            								'Advertise with us'=>'Advertise with us',
            								
            						),
            						'required'    => true,
            				))
            				
            				->add('answer',null,array(
            				
            						'required'    => false,
            						'label' => '',
            						 
            				))
          
        ;
                    
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cup\SiteManagementBundle\Entity\Contact',
            'attr' => array('id'=>'gingercup_contact')
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gingercup_contact';
    }
}