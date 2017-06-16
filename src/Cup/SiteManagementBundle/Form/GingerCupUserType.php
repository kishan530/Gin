<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GingerCupUserType extends AbstractType
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
            ->add('userEmail')
            ->add('userPassword','password',array('required'    => false,))
            ->add('dateCreated','date',array(
          		'widget'=> 'single_text',
          		'format'=>'d/M/y',
          		'required'    => false,
             	'attr' => array('data-date-format' => 'dd/mm/yyyy','class'=>'date-picker')
                ))
            ->add('deviceNo',null,array('required'    => false,))
            ->add('cityId', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'City',
                    'empty_value'   => 'Select',
            		'choices' =>$this->getCity(),
            		'required'    => true,
            ))
             ->add('userType', 'choice', array(
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'User Type',
                    'empty_value'   => 'Select',
            		'choices' =>array('2'=>'Advertiser','3'=>'Sales','4'=>'DataCollector'),
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
            'data_class' => 'Cup\SiteManagementBundle\Entity\GingerCupUser'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_sitemanagementbundle_gingercupuser';
    }
}
