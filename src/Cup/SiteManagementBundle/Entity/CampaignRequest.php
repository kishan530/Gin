<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * CampaignRequest
 *
 * @ORM\Table(name="campaign_request")
 * @ORM\Entity
 */
class CampaignRequest
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
     * @var string
     *
     * @ORM\Column(name="plan_type", type="string", length=50)
     */
    private $planType;
    /**
     * @var string
     *
     * @ORM\Column(name="promotion_type", type="string", length=50)
     */
    private $promotionType;
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
     * @var string
     *
     * @ORM\Column(name="design", type="string", length=100)
     */
    private $design;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=15)

     * @Assert\Length(min = 10, max = 15, maxMessage="Your mobile cannot contain more then 15")

     * @Assert\Regex(

     *     pattern="/^([+0-9]{1,3})?([0-9]{10,12})$/i",

     *     message= "Invalid mobile no."

     * )
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)    
     * @Assert\Email(

     *     message = "The email-id '{{ value }}' is not a valid email.",

     *     checkMX = true

     * )
     */
    private $email;

    /**
     * @var double
     *
     * @ORM\Column(name="total_amount", type="float")
     */
    private $totalAmount;
    /**
     * @var integer
     *
     * @ORM\Column(name="total_reach", type="integer")
     */
    private $totalReach;
    /**
     * @ORM\OneToMany(targetEntity="Cup\SiteManagementBundle\Entity\CampaignCity", mappedBy="campaign", cascade={"persist"})
     */
    private $city;
    /**
    *constructor
    *
    */
     public function __construct() {
    	$this->city = new ArrayCollection();
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
     * Set planType
     *
     * @param string $planType
     * @return CampaignRequest
     */
    public function setPlanType($planType)
    {
        $this->planType = $planType;

        return $this;
    }

    /**
     * Get planType
     *
     * @return string 
     */
    public function getPlanType()
    {
        return $this->planType;
    }
     /**
     * Set promotionType
     *
     * @param string $promotionType
     * @return CampaignRequest
     */
    public function setPromotionType($promotionType)
    {
        $this->promotionType = $promotionType;

        return $this;
    }

    /**
     * Get promotionType
     *
     * @return string 
     */
    public function getPromotionType()
    {
        return $this->promotionType;
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
     * Set design
     *
     * @param string $design
     * @return CampaignRequest
     */
    public function setDesign($design)
    {
        $this->design = $design;

        return $this;
    }

    /**
     * Get design
     *
     * @return string 
     */
    public function getDesign()
    {
        return $this->design;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return CampaignRequest
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
     * Set mobile
     *
     * @param string $mobile
     * @return CampaignRequest
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return CampaignRequest
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set totalAmount
     *
     * @param \double $totalAmount
     * @return CampaignRequest
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * Get totalAmount
     *
     * @return \double 
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }
    
     /**
     * Set totalReach
     *
     * @param \double $totalReach
     * @return CampaignRequest
     */
    public function setTotalReach($totalReach)
    {
        $this->totalReach = $totalReach;

        return $this;
    }

    /**
     * Get totalReach
     *
     * @return \double 
     */
    public function getTotalReach()
    {
        return $this->totalReach;
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
}
