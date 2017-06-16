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