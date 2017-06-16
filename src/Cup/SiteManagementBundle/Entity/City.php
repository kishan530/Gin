<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * This is a Entity to hold the data of City in
 * City
 * @ORM\Table(name="City")
 * @ORM\Entity
 */
class City
{
    /**
     * @var integer
     * @ORM\Column(name="CityId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *  @ORM\Column(name="Name", type="string", length=100)
     */
    private $name;
    /**
     * @ORM\OneToMany(targetEntity="Cup\SiteManagementBundle\Entity\Location", mappedBy="city", cascade={"all"})
     */
    private $location;
    
    /**
    *constructor
    *
    */
     public function __construct() {
    	$this->location = new ArrayCollection();
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
     * @return City
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
     * Set location
     *
     * @param string $location
     * @return City
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

  
}
