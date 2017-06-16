<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CampaignCityType extends AbstractType
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
             ->add('city', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'City',
                    'empty_value'   => 'Select',
            		'choices' =>$this->getCity(),
            		'required'    => true,
            ))
            ->add('budget')
            ->add('campaignDate','date',array(
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
            'data_class' => 'Cup\SiteManagementBundle\Entity\CampaignCity'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_sitemanagementbundle_campaigncity';
    }
}
