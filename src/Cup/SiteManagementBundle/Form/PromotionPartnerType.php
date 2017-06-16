<?php

namespace Cup\SiteManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class PromotionPartnerType extends AbstractType
{
    private $cupService;
    private $selectedCity;
	
	public function __construct($cupService,$selectedCity)
	{
		$this->cupService= $cupService;
        $this->selectedCity = $selectedCity;
	}
    /**
	 * @param OptionsResolverInterface $resolver
	 */
	private function getPartners($city)
	{
		$partners = $this->cupService->getPartnerByCity($city);
		$tempPartners = array();
		foreach ($partners as $partner){
            // if($location->getActive()){
                 $partnerDetails = $partner->getPartner();
            //echo var_dump($partner->getCompanyName());
            //exit();
		          $tempPartners[$partner->getId()] = $partnerDetails->getCompanyName().'-'.$partner->getNoOfOrders();
            // }
		}
		return $tempPartners;
	}
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city','hidden')
        ;
        
        $factory = $builder->getFormFactory();
         $refreshAreas = function ($form, $city) use ($factory)
            {
            	$form->add($factory->createNamed('partner','choice', null, array(
            			'auto_initialize' => false,
            			'expanded' => false,
            		'multiple' => true,
                    'label' => 'Partner',
                    'empty_value'   => 'Select',
            		'choices' => $this->getPartners($city),
                    'attr'   =>  array(
                                        'class'=>'chosen-select',
                                        'data-style'=>'btn-white',
                                        'data-live-search'=>'true',
                                        'data-placeholder'=>'Add Delivery Partners'
				            		),
            		'required'    => false,
                    )));
            };
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($refreshAreas)
            {
            	$form = $event->getForm();
            	$data = $event->getdata();
            		
            	if($data == null)
            	{
            		return;
            	}else{
            		$City = ($data->getCity()) ? $data->getCity() : null ;
            		//$setCity($form, $City);
            		$refreshAreas($form, $City);
            	}
            });
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) use ($refreshAreas)
            {
            	$form = $event->getForm();
            	$data = $event->getData();
            
            		
            	if(array_key_exists('city', $data)) {
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
            'data_class' => 'Cup\SiteManagementBundle\Entity\PromotionPartner'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_sitemanagementbundle_promotion_partner';
    }
}
