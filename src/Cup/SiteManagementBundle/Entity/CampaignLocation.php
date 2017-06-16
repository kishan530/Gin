<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaignLocation
 *
 * @ORM\Table(name="campaign_location")
 * @ORM\Entity
 */
class CampaignLocation
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
     * @ORM\Column(name="location", type="integer")
     */
    private $location;

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
     * @ORM\ManyToOne(targetEntity="Cup\SiteManagementBundle\Entity\CampaignCity", inversedBy="location")
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
     * Set location
     *
     * @param integer $location
     * @return CampaignLocation
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return integer 
     */
    public function getLocation()
    {
        return $this->location;
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
