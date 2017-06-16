<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CampaignCity
 *
 * @ORM\Table(name="campaign_city")
 * @ORM\Entity
 */
class CampaignCity
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
     * @ORM\Column(name="city", type="integer")
     */
    private $city;

    /**
     * @var float
     *
     * @ORM\Column(name="budget", type="float")
     */
    private $budget;
    /**
     * @var string
     *
     * @ORM\Column(name="campaign_date", type="date")
     */
    private $campaignDate;
    /**
     * @var string
     *
     * @ORM\Column(name="campaign_end_date", type="date")
     */
    private $campaignEndDate;
    /**
     * @var integer
     *
     * @ORM\Column(name="reach", type="integer")
     */
    private $reach;
    /**
     * @var integer
     *
     * @ORM\Column(name="cup_quantity_per_day", type="integer")
     */
    private $cupQuantityPerDay;
    /**
     * @var float
     *
     * @ORM\Column(name="cost_for_reach", type="float")
     */
    private $costForReach;

    /**
     * @var integer
     *
     * @ORM\Column(name="no_of_days", type="integer")
     */
    private $noOfDays;
    /**
     * @ORM\ManyToOne(targetEntity="Cup\SiteManagementBundle\Entity\CampaignRequest", inversedBy="city")
     * @ORM\JoinColumn(name="campaign_id", referencedColumnName="id")
     */
    private $campaign;
        /**
     * @ORM\OneToMany(targetEntity="Cup\SiteManagementBundle\Entity\CampaignLocation", mappedBy="campaignCity", cascade={"persist"})
     */
    private $location;
    /**
     * @ORM\OneToMany(targetEntity="Cup\SiteManagementBundle\Entity\PromotionPartner", mappedBy="campaignCity", cascade={"persist"})
     */
    private $partner;

    /**
    *constructor
    *
    */
     public function __construct() {
    	$this->location = new ArrayCollection();
         $this->partner = new ArrayCollection();
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
     * Set city
     *
     * @param integer $city
     * @return CampaignCity
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
     * Set budget
     *
     * @param \double $budget
     * @return CampaignCity
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return \double 
     */
    public function getBudget()
    {
        return $this->budget;
    }
     /**
     * Set campaignDate
     *
     * @param string $campaignDate
     * @return CampaignRequest
     */
    public function setCampaignDate($campaignDate)
    {
        $this->campaignDate = $campaignDate;

        return $this;
    }

    /**
     * Get campaignDate
     *
     * @return string 
     */
    public function getCampaignDate()
    {
        return $this->campaignDate;
    }
     /**
     * Set campaignEndDate
     *
     * @param string $campaignEndDate
     * @return CampaignRequest
     */
    public function setCampaignEndDate($campaignEndDate)
    {
        $this->campaignEndDate = $campaignEndDate;

        return $this;
    }

    /**
     * Get campaignEndDate
     *
     * @return string 
     */
    public function getCampaignEndDate()
    {
        return $this->campaignEndDate;
    }
     /**
     * Set reach
     *
     * @param integer $reach
     * @return CampaignLocation
     */
    public function setReach($reach)
    {
        $this->reach = $reach;
        return $this;
    }

    /**
     * Get reach
     *
     * @return integer 
     */
    public function getReach()
    {
        return $this->reach;
    }
    
    /**
     * Set cupQuantityPerDay
     *
     * @param integer $cupQuantityPerDay
     * @return Consumer
     */
    public function setCupQuantityPerDay($cupQuantityPerDay)
    {
        $this->cupQuantityPerDay = $cupQuantityPerDay;

        return $this;
    }

    /**
     * Get cupQuantityPerDay
     *
     * @return integer 
     */
    public function getCupQuantityPerDay()
    {
        return $this->cupQuantityPerDay;
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
     * Set costForReach
     *
     * @param \double $costForReach
     * @return CampaignCity
     */
    public function setCostForReach($costForReach)
    {
        $this->costForReach = $costForReach;

        return $this;
    }

    /**
     * Get costForReach
     *
     * @return \double 
     */
    public function getCostForReach()
    {
        return $this->costForReach;
    }
    /**
     * Set campaign
     *
     * @param string $campaign
     * @return CampaignRequest
     */
    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;

        return $this;
    }

    /**
     * Get campaign
     *
     * @return string 
     */
    public function getCampaign()
    {
        return $this->campaign;
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
}
