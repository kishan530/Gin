<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Doctrine\ORM\EntityRepository;
/**
 * This is a Form to collect the data of BulkFileUpload in
 * Drivekool application.
 */
class UploadExcelType extends AbstractType
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
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('filePath', 'file',array(
        		'required' => false,
        		'data_class' => null,
        		'attr'   =>  array(
        				'class'   => 'filestyle',
        				'data-icon'   => 'false'
        		),
        ))
        ->add('city', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'City',
                    'empty_value'   => 'Select',
            		'choices' =>$this->getCity(),
            		'required'    => true,
        ))
        ;
    }
    
 
    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_bulk_consumer_upload';
    }
}
