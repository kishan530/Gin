<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\Event\DataEvent;



class ConsumerType extends AbstractType
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
	private function getLocations($city)
	{
		$locations = $this->cupService->getLocationByCity($city);
		$tempLocations = array();
		foreach ($locations as $location){
            // if($location->getActive()){
                // $city = $location->getCity();
		          $tempLocations[$location->getId()] = $location->getName();
            // }
		}
		return $tempLocations;
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
	private function getActivityType()
	{
		$types = $this->cupService->getActivityTypes();
		$tempTypes = array();
	
		foreach ($types as $type){
			//if($city->getActive()){
			$tempTypes[$type->getId()] = $type->getActivity();
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
            ->add('estabName')
            ->add('contactName')
            ->add('contactNo')
            ->add('altNo',null,array('required'    => false))
            ->add('emailId',null,array('required'    => false))
            ->add('address')
           // ->add('location')
            ->add('city', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'City',
                    'empty_value'   => 'Select',
            		//'choices' =>$this->getCity(),
            		'required'    => true,
            ))
             ->add('location', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'Location',
                    'empty_value'   => 'Select',
            		//'choices' => $this->getLocations(),
            		'required'    => true,
            ))
             ->add('estabType', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'Estab Type',
                    'empty_value'   => 'Select',
            		'choices' => $this->getEstabType(),
            		'required'    => true,
            ))
            ->add('activityType', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
            		'label' => 'Activity Type',
            		//'empty_value'   => 'Select',
            		'choices' => $this->getActivityType(),
            		'required'    => true,
            ))
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
            		'required'    => true,
            ))
            ->add('landMark')
            ->add('lat')
            ->add('lng')
            //->add('estabType')
            ->add('cupSizes')
            ->add('cupSizes2')
            ->add('cupSizes3')
            ->add('cupQuantityPerDay', 'text', array(
            		'label' => 'CupQuantity Per Month',
            ))
            ->add('cupQuantityPerDay2')
            ->add('cupQuantityPerDay3')
            ->add('reach')
            ->add('createdBy', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'Added By',
                    'empty_value'   => 'Select',
            		'choices' =>$this->getUsers(),
            		'required'    => true,
            ))
            ->add('remark')
        ;
        
        
         $factory = $builder->getFormFactory();
         
        $setCity = function ($form, $City) use ($factory)
        {
        	$form->add($factory->createNamed('city', 'choice', null, array(
        			'expanded' => false,
        			'multiple' => false,
        			'empty_value'   => '-- City --',
        			'data' => $City,
        			'choices' => $this->getCity(),
        			'required'    => true,
        			'auto_initialize' => false,
        
        	)));
        
        };
        $refreshAreas = function ($form, $City) use ($factory)
        {
        		$form->add($factory->createNamed('location', 'choice', null, array(
        				'expanded' => false,
        				'multiple' => false,
        				'empty_value'   => '-- location --',
        				'attr'   =>  array(
        						'data-placeholder'=>'Choose a location'
        				),
        				'choices' => $this->getLocations($City),
        				'required'    => true,
        				'auto_initialize' => false,
        
        		)));
        
        };
        
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($setCity, $refreshAreas)
        {
        	$form = $event->getForm();
        	$data = $event->getdata();
        
        	if($data == null)
        	{
        		return;
        	}else{
        		$City = ($data->getCity()) ? $data->getCity() : null ;
        		$setCity($form, $City);
        		$refreshAreas($form, $City);
        	}
        });
         
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) use ($refreshAreas,$setCity)
        {
        	$form = $event->getForm();
        	$data = $event->getData();
        	if(array_key_exists('city', $data)) {
        		$setCity($form, $data['city']);
        		$refreshAreas($form, $data['city']);
        	}
        
        });
        
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
        return 'cup_sitemanagementbundle_consumer';
    }
}
