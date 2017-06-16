<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PromotionPartner
 *
 * @ORM\Table(name="promotion_partner")
 * @ORM\Entity
 */
class PromotionPartner
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="promotion_partner", type="integer")
     */
    private $partner;

    /**
     * @var integer
     *
     * @ORM\Column(name="city", type="integer")
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="no_of_reach", type="integer")
     */
    private $noOfReach;

    /**
     * @var integer
     *
     * @ORM\Column(name="no_of_days", type="integer")
     */
    private $noOfDays;
        /**
     * @var integer
     *
     * @ORM\Column(name="campaign_id", type="integer")
     */
    private $campaignId;
    /**
     * @ORM\ManyToOne(targetEntity="Cup\SiteManagementBundle\Entity\CampaignCity", inversedBy="partner")
     * @ORM\JoinColumn(name="campaign_city_id", referencedColumnName="id")
     */
    private $campaignCity;


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
     * Set partner
     *
     * @param string $partner
     *
     * @return DeliveryDetail
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * Get partner
     *
     * @return string
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * Set city
     *
     * @param integer $city
     * @return CampaignLocation
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return integer 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set noOfReach
     *
     * @param integer $noOfReach
     * @return CampaignLocation
     */
    public function setNoOfReach($noOfReach)
    {
        $this->noOfReach = $noOfReach;

        return $this;
    }

    /**
     * Get noOfReach
     *
     * @return integer 
     */
    public function getNoOfReach()
    {
        return $this->noOfReach;
    }

    /**
     * Set noOfDays
     *
     * @param integer $noOfDays
     * @return CampaignLocation
     */
    public function setNoOfDays($noOfDays)
    {
        $this->noOfDays = $noOfDays;

        return $this;
    }

    /**
     * Get noOfDays
     *
     * @return integer 
     */
    public function getNoOfDays()
    {
        return $this->noOfDays;
    }
     /**
     * Set campaignId
     *
     * @param integer $campaignId
     * @return CampaignLocation
     */
    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

        return $this;
    }

    /**
     * Get campaignId
     *
     * @return integer 
     */
    public function getCampaignId()
    {
        return $this->campaignId;
    }
        /**
     * Set campaignCity
     *
     * @param string $campaignCity
     * @return CampaignLocation
     */
    public function setCampaignCity($campaignCity)
    {
        $this->campaignCity = $campaignCity;

        return $this;
    }

    /**
     * Get campaignCity
     *
     * @return string 
     */
    public function getCampaignCity()
    {
        return $this->campaignCity;
    }
}
