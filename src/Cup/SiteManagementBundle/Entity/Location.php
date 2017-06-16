<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Location
 *
 * @ORM\Table(name="Locations")
 * @ORM\Entity
 */
class Location
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IdLocations", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="LocationName", type="string", length=100)
     */
    private $name;
    /**
     * @var string
     *
     */
    private $cityId;

    /**
     * @ORM\ManyToOne(targetEntity="Cup\SiteManagementBundle\Entity\City", inversedBy="location")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="CityId")
     */
    private $city;
    
    /**
     * @var string
     */
    private $errors;
    
    public function __construct() {
    	$this->errors = array();
    }
    
   
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Area
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

  
    /**
     *
     * @return the unknown_type
     */
    public function getCity() {
    	return $this->city;
    }
    
    /**
     *
     * @param unknown_type $city
     */
    public function setCity($city) {
    	$this->city = $city;
    	return $this;
    }
    
     /**
     * Set errors
     *
     * @param array $errors
     * @return Consumer
     */
    public function setErrors($errors)
    {
    	$this->errors = $errors;
    
    	return $this;
    }
    
    /**
     * Get errors
     *
     * @return array
     */
    public function getErrors()
    {
    	return $this->errors;
    }
    
    /**
     *
     * @return the unknown_type
     */
    /*public function getCityId() {
    	return $this->cityId;
    }*/
    
    /**
     *
     * @param unknown_type $city
     */
    /*public function setCityId($cityId) {
    	$this->cityId = $cityId;
    	return $this;
    } */
}