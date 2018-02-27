<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConsumerSearchType extends AbstractType
{
     private $cupService;
	
	public function __construct($cupService)
	{
		$this->cupService= $cupService;
	}
    /**
	 * @param OptionsResolverInterface $resolver
	 */
	private function getCity()
	{
		$cities = $this->cupService->getCity();
		$tempCities = array();
		foreach ($cities as $city){
             //if($city->getActive()){
		          $tempCities[$city->getId()] = $city->getName();
            // }
		}
		return $tempCities;
	}
    /**
	 * @param OptionsResolverInterface $resolver
	 */
	private function getUsers()
	{
		$cities = $this->cupService->getUsers();
		$tempCities = array();
		foreach ($cities as $city){
             //if($city->getActive()){
		          $tempCities[$city->getId()] = $city->getUserEmail();
            // }
		}
		return $tempCities;
	}
     /**
	 * @param OptionsResolverInterface $resolver
	 */
	private function getEstabType()
	{
		$types = $this->cupService->getEstubTypes();
		$tempTypes = array();
		
        foreach ($types as $type){
             //if($city->getActive()){
		          $tempTypes[$type->getId()] = $type->getTypeName();
            // }
		}
		return $tempTypes;
	}
	
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('estabName',null,array('required'    => false))
             ->add('mobile',null,array('required'    => false,'label' => 'Contact No',))
            
            ->add('createdBy', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'user',
                    'empty_value'   => 'Select',
            		'choices' =>$this->getUsers(),
            		'required'    => false,
            ))
            ->add('city', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'City',
                    'empty_value'   => 'Select',
            		'choices' =>$this->getCity(),
            		'required'    => false,
            ))
             ->add('estabType', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'Estab Type',
                    'empty_value'   => 'Select',
            		'choices' => $this->getEstabType(),
            		'required'    => false,
            ))
           /* ->add('activityType', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
            		'label' => 'Activity Type',
            		'empty_value'   => 'Select',
            		'choices' => $this->getActivityType(),
            		'required'    => false,
            ))*/
            ->add('rating', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
            		'label' => 'Rating',
            		'empty_value'   => 'Select',
            		'choices' =>array(
            				'1'=>'1',
            				'2'=>'2',
            				'3'=>'3',
            				'4'=>'4',
            				'5'=>'5',
            		),
            		'required'    => false,
            ))
             ->add('startDate','date',array(
          		'widget'=> 'single_text',
          		'format'=>'d/M/y',
          		'required'    => false,
             	'attr' => array('data-date-format' => 'dd/mm/yyyy','class'=>'date-picker')
          ))
             ->add('endDate','date',array(
          		'widget'=> 'single_text',
          		'format'=>'d/M/y',
          		'required'    => false,
             	'attr' => array('data-date-format' => 'dd/mm/yyyy','class'=>'date-picker')
          ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cup\SiteManagementBundle\Entity\Consumer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_sitemanagementbundle_consumer_search';
    }
}
