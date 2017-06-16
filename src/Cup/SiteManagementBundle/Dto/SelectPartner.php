<?php

namespace Cup\SiteManagementBundle\Dto;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SelectCity
 */
class SelectPartner
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     *
     */
    private $partners;
    
    public function __construct() {
    	$this->partners = new ArrayCollection();
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
     * Set partners
     *
     * @param string $partners
     *
     * @return DeliveryDetail
     */
    public function setPartners($partners)
    {
        $this->partners = $partners;

        return $this;
    }

    /**
     * Get partners
     *
     * @return string
     */
    public function getPartners()
    {
        return $this->partners;
    }

   
}

