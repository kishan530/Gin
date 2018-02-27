<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Consumer
 *
 * @ORM\Table(name="consumer")
 * @ORM\Entity
 * @ORM\Entity
 * @ORM\NamedQueries({
 *     @ORM\NamedQuery(name="list", query="SELECT b.id,b.estabName,b.contactName,b.contactNo,b.altNo,b.emailId,b.address,b.landMark,b.cupSizes,b.cupSizes2,b.cupSizes3,b.cupQuantityPerDay,b.cupQuantityPerDay2,b.cupQuantityPerDay3,b.reach,l.name location,c.name city,e.typeName,b.rating FROM CupSiteManagementBundle:Consumer b left join CupSiteManagementBundle:City c with c.id=b.city left join CupSiteManagementBundle:Location l with l.id=b.location left join CupSiteManagementBundle:EstabType e with e.id=b.estabType WHERE ( :createdBy is null OR b.createdBy=:createdBy ) AND ( :city is null OR b.city=:city ) AND ( :type is null OR b.estabType=:type ) AND ( :rating is null OR b.rating=:rating ) AND ( :name is null OR b.estabName like :name ) AND ( :mobile is null OR b.contactNo like :mobile ) AND b.createdAt BETWEEN  :start AND :end ORDER BY b.id DESC")
 * })
 */
class Consumer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ConsumerId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="EstabName", type="string", length=100)
     */
    private $estabName;

    /**
     * @var string
     *
     * @ORM\Column(name="ContactName", type="string", length=100)
     */
    private $contactName;

    /**
     * @var string
     *
     * @ORM\Column(name="ContactNo", type="string", length=100)
     * @Assert\Length(min = 10, max = 15, maxMessage="Your mobile cannot contain more then 15")

     * @Assert\Regex(

     *     pattern="/^([+0-9]{1,3})?([0-9]{10,12})$/i",

     *     message= "Invalid mobile no."

     * )
     */
    private $contactNo;
    /**
     * @var string
     */
    private $mobile;
    /**
     * @var string
     *
     * @ORM\Column(name="altNo", type="string", length=100)
     * @Assert\Length(min = 10, max = 15, maxMessage="Your mobile cannot contain more then 15")
     * @Assert\Regex(

     *     pattern="/^([+0-9]{1,3})?([0-9]{10,12})$/i",

     *     message= "Invalid mobile no."

     * )
     */
    private $altNo;

    /**
     * @var string
     *
     * @ORM\Column(name="EmailId", type="string", length=200)
     * @Assert\Email(

     *     message = "The email-id '{{ value }}' is not a valid email.",

     *     checkMX = true

     * )
     */
    private $emailId;

    /**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=3000)
     */
    private $address;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="city", type="integer")
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="Location", type="integer")
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="LandMark", type="string", length=100)
     */
    private $landMark;

    /**
     * @var string
     *
     * @ORM\Column(name="Lat", type="string", length=100)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="Lng", type="string", length=100)
     */
    private $lng;

    /**
     * @var integer
     *
     * @ORM\Column(name="EstabType", type="integer")
     */
    private $estabType;

    /**
     * @var integer
     *
     * @ORM\Column(name="activity_type", type="integer")
     */
    private $activityType;
    /**
     * @var string
     *
     * @ORM\Column(name="CupSizes", type="string", length=100)
     */
    private $cupSizes;
    /**
     * @var string
     *
     * @ORM\Column(name="CupSizes2", type="string", length=100)
     */
    private $cupSizes2;
    /**
     * @var string
     *
     * @ORM\Column(name="CupSizes3", type="string", length=100)
     */
    private $cupSizes3;

    /**
     * @var integer
     *
     * @ORM\Column(name="CupQuantityPerDay", type="integer")
     */
    private $cupQuantityPerDay;
    /**
     * @var integer
     *
     * @ORM\Column(name="CupQuantityPerDay2", type="integer")
     */
    private $cupQuantityPerDay2;
    /**
     * @var integer
     *
     * @ORM\Column(name="CupQuantityPerDay3", type="integer")
     */
    private $cupQuantityPerDay3;
      /**
     * @var integer
     *
     * @ORM\Column(name="reach", type="integer")
     */
    private $reach;
    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(name="Remark", type="text")
     */
    private $remark;

    /**
     * @var string
     *
     * @ORM\Column(name="AddedBy", type="string", length=100)
     */
    private $createdBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateAdded", type="datetime")
     */
    private $createdAt;
    
    /**
     * @var string
     */
    private $startDate;
    /**
     * @var string
     */
    private $endDate;
    
    /**
     * @var string
     */
    private $errors;
    
    public function __construct() {
    	$this->errors = array();
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
     * Set estabName
     *
     * @param string $estabName
     * @return Consumer
     */
    public function setEstabName($estabName)
    {
        $this->estabName = $estabName;

        return $this;
    }

    /**
     * Get estabName
     *
     * @return string 
     */
    public function getEstabName()
    {
        return $this->estabName;
    }

    /**
     * Set contactName
     *
     * @param string $contactName
     * @return Consumer
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;

        return $this;
    }

    /**
     * Get contactName
     *
     * @return string 
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * Set contactNo
     *
     * @param string $contactNo
     * @return Consumer
     */
    public function setContactNo($contactNo)
    {
        $this->contactNo = $contactNo;

        return $this;
    }

    /**
     * Get contactNo
     *
     * @return string 
     */
    public function getContactNo()
    {
        return $this->contactNo;
    }
    
     /**

     * Set mobile

     *

     * @param string $mobile

     * @return Contact

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
     * Set altNo
     *
     * @param string $altNo
     * @return Consumer
     */
    public function setAltNo($altNo)
    {
        $this->altNo = $altNo;

        return $this;
    }

    /**
     * Get altNo
     *
     * @return string 
     */
    public function getAltNo()
    {
        return $this->altNo;
    }

    /**
     * Set emailId
     *
     * @param string $emailId
     * @return Consumer
     */
    public function setEmailId($emailId)
    {
        $this->emailId = $emailId;

        return $this;
    }

    /**
     * Get emailId
     *
     * @return string 
     */
    public function getEmailId()
    {
        return $this->emailId;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Consumer
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    
     /**
     * Set city
     *
     * @param integer $city
     * @return Consumer
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
     * Set location
     *
     * @param integer $location
     * @return Consumer
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
     * Set landMark
     *
     * @param string $landMark
     * @return Consumer
     */
    public function setLandMark($landMark)
    {
        $this->landMark = $landMark;

        return $this;
    }

    /**
     * Get landMark
     *
     * @return string 
     */
    public function getLandMark()
    {
        return $this->landMark;
    }

    /**
     * Set lat
     *
     * @param string $lat
     * @return Consumer
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return string 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param string $lng
     * @return Consumer
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return string 
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set estabType
     *
     * @param integer $estabType
     * @return Consumer
     */
    public function setEstabType($estabType)
    {
        $this->estabType = $estabType;

        return $this;
    }

    /**
     * Get estabType
     *
     * @return integer 
     */
    public function getEstabType()
    {
        return $this->estabType;
    }

    /**
     * Set cupSizes
     *
     * @param string $cupSizes
     * @return Consumer
     */
    public function setCupSizes($cupSizes)
    {
        $this->cupSizes = $cupSizes;

        return $this;
    }

    /**
     * Get cupSizes
     *
     * @return string 
     */
    public function getCupSizes()
    {
        return $this->cupSizes;
    }
   
    /**
     * Set cupSizes2
     *
     * @param string $cupSizes2
     * @return Consumer
     */
    public function setCupSizes2($cupSizes2)
    {
        $this->cupSizes2 = $cupSizes2;

        return $this;
    }

    /**
     * Get cupSizes2
     *
     * @return string 
     */
    public function getCupSizes2()
    {
        return $this->cupSizes2;
    }
     /**
     * Set cupSizes3
     *
     * @param string $cupSizes3
     * @return Consumer
     */
    public function setCupSizes3($cupSizes3)
    {
        $this->cupSizes3 = $cupSizes3;

        return $this;
    }

    /**
     * Get cupSizes3
     *
     * @return string 
     */
    public function getCupSizes3()
    {
        return $this->cupSizes3;
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
     * Set cupQuantityPerDay2
     *
     * @param integer $cupQuantityPerDay2
     * @return Consumer
     */
    public function setCupQuantityPerDay2($cupQuantityPerDay2)
    {
        $this->cupQuantityPerDay2 = $cupQuantityPerDay2;

        return $this;
    }

    /**
     * Get cupQuantityPerDay2
     *
     * @return integer 
     */
    public function getCupQuantityPerDay2()
    {
        return $this->cupQuantityPerDay2;
    }
     /**
     * Set cupQuantityPerDay3
     *
     * @param integer $cupQuantityPerDay3
     * @return Consumer
     */
    public function setCupQuantityPerDay3($cupQuantityPerDay3)
    {
        $this->cupQuantityPerDay3 = $cupQuantityPerDay3;

        return $this;
    }

    /**
     * Get cupQuantityPerDay3
     *
     * @return integer 
     */
    public function getCupQuantityPerDay3()
    {
        return $this->cupQuantityPerDay3;
    }
    
     /**
     * Set reach
     *
     * @param \double $reach
     * @return Consumer
     */
    public function setReach($reach)
    {
        $this->reach = $reach;

        return $this;
    }

    /**
     * Get reach
     *
     * @return \double 
     */
    public function getReach()
    {
        return $this->reach;
    }
	
	/**
	 *
	 * @return the integer
	 */
	public function getRating() {
		return $this->rating;
	}
	
	/**
	 *
	 * @param
	 *        	$rating
	 */
	public function setRating($rating) {
		$this->rating = $rating;
		return $this;
	}
	    
    /**
     * Set remark
     *
     * @param string $remark
     * @return Consumer
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Get remark
     *
     * @return string 
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     * @return Consumer
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Consumer
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * Set startDate
     *
     * @param string $startDate
     * @return Consumer
     */
    public function setStartDate($startDate)
    {
    	$this->startDate = $startDate;
    
    	return $this;
    }
    
    /**
     * Get startDate
     *
     * @return string
     */
    public function getStartDate()
    {
    	return $this->startDate;
    }
    
    /**
     * Set endDate
     *
     * @param string $endDate
     * @return Consumer
     */
    public function setEndDate($endDate)
    {
    	$this->endDate = $endDate;
    
    	return $this;
    }
    
    /**
     * Get endDate
     *
     * @return string
     */
    public function getEndDate()
    {
    	return $this->endDate;
    }
    
     /**
     * Set errors
     *
     * @param array $errors
     * @return Consumer
     */
    public function setErrors($errors)
    {
    	$this->errors = $errors;
    
    	return $this;
    }
    
    /**
     * Get errors
     *
     * @return array
     */
    public function getErrors()
    {
    	return $this->errors;
    }
	public function getActivityType() {
		return $this->activityType;
	}
	public function setActivityType($activityType) {
		$this->activityType = $activityType;
		return $this;
	}
	
    
}
