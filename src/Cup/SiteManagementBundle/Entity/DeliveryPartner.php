<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * DeliveryPartner
 *
 * @ORM\Table(name="delivery_partner")
 * @ORM\Entity(repositoryClass="Cup\SiteManagementBundle\Repository\DeliveryPartnerRepository")
 */
class DeliveryPartner
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", length=80)
     */
    private $companyName;

    /**
     * @var string
     *
     * @ORM\Column(name="industry_type", type="string", length=50)
     */
    private $industryType;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=50)
     */
    private $phoneNumber;
    /**
     * @var string
     *
     * @ORM\Column(name="package_dimenson", type="string", length=50)
     */
    private $packageDimenson;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=5000)
     */
    private $note;
    /**
     * @ORM\OneToMany(targetEntity="Cup\SiteManagementBundle\Entity\DeliveryDetail", mappedBy="partner", cascade={"persist"})
     */
    private $detail;
    /**
     * @ORM\OneToMany(targetEntity="Cup\SiteManagementBundle\Entity\DeliveryDay", mappedBy="partner", cascade={"persist"})
     */
    private $deliveryDay;
    /**
     * @ORM\OneToMany(targetEntity="Cup\SiteManagementBundle\Entity\DeliveryCustomerDetails", mappedBy="partner", cascade={"persist"})
     */
    private $customerDetail;
    /**
     * @ORM\OneToMany(targetEntity="Cup\SiteManagementBundle\Entity\AgeGroup", mappedBy="partner", cascade={"persist"})
     */
    private $ageGroup;
     /**
     * @ORM\OneToMany(targetEntity="Cup\SiteManagementBundle\Entity\IncomeGroup", mappedBy="partner", cascade={"persist"})
     */
    private $incomeGroup;
    /**
     * @var int
     *
     */
    private $day;
    /**
     * @var int
     *
     */
    private $city;

    /**
    *constructor
    *
    */
     public function __construct() {
    	$this->detail = new ArrayCollection();
        $this->deliveryDay = new ArrayCollection();
        $this->customerDetail = new ArrayCollection();
        $this->ageGroup = new ArrayCollection();
         $this->incomeGroup = new ArrayCollection();
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
     * Set companyName
     *
     * @param string $companyName
     *
     * @return DeliveryPartner
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set industryType
     *
     * @param string $industryType
     *
     * @return DeliveryPartner
     */
    public function setIndustryType($industryType)
    {
        $this->industryType = $industryType;

        return $this;
    }

    /**
     * Get industryType
     *
     * @return string
     */
    public function getIndustryType()
    {
        return $this->industryType;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return DeliveryPartner
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
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return DeliveryPartner
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
        /**
     * Set packageDimenson
     *
     * @param string $packageDimenson
     *
     * @return DeliveryDetail
     */
    public function setPackageDimenson($packageDimenson)
    {
        $this->packageDimenson = $packageDimenson;

        return $this;
    }

    /**
     * Get packageDimenson
     *
     * @return string
     */
    public function getPackageDimenson()
    {
        return $this->packageDimenson;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return DeliveryPartner
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }
    
     /**
     * Set detail
     *
     * @param integer $city
     *
     * @return DeliveryDetail
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return int
     */
    public function getDetail()
    {
        return $this->detail;
    }
    
     /**
     * Set city
     *
     * @param integer $city
     *
     * @return DeliveryDetail
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return int
     */
    public function getCity()
    {
        return $this->city;
    }
    
     /**
     * Set deliveryDay
     *
     * @param integer $deliveryDay
     *
     * @return DeliveryDetail
     */
    public function setDeliveryDay($deliveryDay)
    {
        $this->deliveryDay = $deliveryDay;

        return $this;
    }

    /**
     * Get deliveryDay
     *
     * @return int
     */
    public function getDeliveryDay()
    {
        return $this->deliveryDay;
    }
    
     /**
     * Set day
     *
     * @param integer $day
     *
     * @return DeliveryDetail
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }
    
     /**
     * Set customerDetail
     *
     * @param integer $customerDetail
     *
     * @return DeliveryDetail
     */
    public function setCustomerDetail($customerDetail)
    {
        $this->customerDetail = $customerDetail;

        return $this;
    }

    /**
     * Get customerDetail
     *
     * @return int
     */
    public function getCustomerDetail()
    {
        return $this->customerDetail;
    }
    
      /**
     * Set ageGroup
     *
     * @param string $ageGroup
     *
     * @return DeliveryCustomerDetails
     */
    public function setAgeGroup($ageGroup)
    {
        $this->ageGroup = $ageGroup;

        return $this;
    }
    
    
    

    /**
     * Get ageGroup
     *
     * @return string
     */
    public function getAgeGroup()
    {
        return $this->ageGroup;
    }
    
    
    /**
     * Set incomeGroup
     *
     * @param string $ageGroup
     *
     * @return DeliveryCustomerDetails
     */
    public function setIncomeGroup($incomeGroup)
    {
        $this->incomeGroup = $incomeGroup;

        return $this;
    }

    /**
     * Get incomeGroup
     *
     * @return string
     */
    public function getIncomeGroup()
    {
        return $this->incomeGroup;
    }




}

