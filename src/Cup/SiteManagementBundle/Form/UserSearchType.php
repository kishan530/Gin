<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserSearchType extends AbstractType
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
            ->add('cityId', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'City',
                    'empty_value'   => 'Select',
            		'choices' =>$this->getCity(),
            		'required'    => false,
            ))
             ->add('userType', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'User Type',
                    'empty_value'   => 'Select',
            		'choices' =>array('2'=>'Advertiser','3'=>'Sales','4'=>'DataCollector'),
            		'required'    => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cup\SiteManagementBundle\Entity\GingerCupUser'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_sitemanagementbundle_user_search';
    }
}
