<?php

namespace Cup\SiteManagementBundle\Dto;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * DelivesryDetail
 */
class DeliveryDetails
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     *
     */
    private $deliveryDetail;
    
    public function __construct() {
    	$this->deliveryDetail = new ArrayCollection();
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
     * Set deliveryDetail
     *
     * @param string $deliveryDetail
     *
     * @return DeliveryDetail
     */
    public function setDeliveryDetail($deliveryDetail)
    {
        $this->deliveryDetail = $deliveryDetail;

        return $this;
    }

    /**
     * Get deliveryDetail
     *
     * @return string
     */
    public function getDeliveryDetail()
    {
        return $this->deliveryDetail;
    }

   
}

