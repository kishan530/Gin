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
class UploadLocationExcelType extends AbstractType
{
    private $cupService;
	
	public function __construct($cupService)
	{
		$this->cupService= $cupService;
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
       
        ;
    }
    
 
    /**
     * @return string
     */
    public function getName()
    {
        return 'cup_bulk_location_upload';
    }
}
