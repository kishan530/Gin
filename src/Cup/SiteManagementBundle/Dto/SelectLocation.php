<?php

namespace Cup\SiteManagementBundle\Dto;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SelectCity
 */
class SelectLocation
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     *
     */
    private $locations;
    
    public function __construct() {
    	$this->locations = new ArrayCollection();
    }



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set locations
     *
     * @param string $locations
     *
     * @return DeliveryDetail
     */
    public function setLocations($locations)
    {
        $this->locations = $locations;

        return $this;
    }

    /**
     * Get locations
     *
     * @return string
     */
    public function getLocations()
    {
        return $this->locations;
    }

   
}

