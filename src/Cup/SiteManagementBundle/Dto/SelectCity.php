<?php

namespace Cup\SiteManagementBundle\Dto;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SelectCity
 */
class SelectCity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     *
     */
    private $cities;
    
    public function __construct() {
    	$this->cities = new ArrayCollection();
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
     * Set cities
     *
     * @param string $cities
     *
     * @return DeliveryDetail
     */
    public function setCities($cities)
    {
        $this->cities = $cities;

        return $this;
    }

    /**
     * Get cities
     *
     * @return string
     */
    public function getCities()
    {
        return $this->cities;
    }

   
}

