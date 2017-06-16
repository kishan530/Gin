<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GingerCupUser
 *
 * @ORM\Table(name="GingerCupUser")
 * @ORM\Entity
 */
class GingerCupUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="UserId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="UserEmail", type="string", length=255)
     */
    private $userEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="UserPassword", type="string", length=255)
     */
    private $userPassword;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreated", type="datetime")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LastLoginDate", type="datetime")
     */
    private $lastLoginDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="UserType", type="integer")
     */
    private $userType;

    /**
     * @var string
     *
     * @ORM\Column(name="DeviceNo", type="string", length=100)
     */
    private $deviceNo;

    /**
     * @var integer
     *
     * @ORM\Column(name="city_id", type="integer")
     */
    private $cityId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsActive", type="boolean")
     */
    private $isActive;


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
     * Set userEmail
     *
     * @param string $userEmail
     * @return GingerCupUser
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string 
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set userPassword
     *
     * @param string $userPassword
     * @return GingerCupUser
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;

        return $this;
    }

    /**
     * Get userPassword
     *
     * @return string 
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return GingerCupUser
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set lastLoginDate
     *
     * @param \DateTime $lastLoginDate
     * @return GingerCupUser
     */
    public function setLastLoginDate($lastLoginDate)
    {
        $this->lastLoginDate = $lastLoginDate;

        return $this;
    }

    /**
     * Get lastLoginDate
     *
     * @return \DateTime 
     */
    public function getLastLoginDate()
    {
        return $this->lastLoginDate;
    }

    /**
     * Set userType
     *
     * @param integer $userType
     * @return GingerCupUser
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return integer 
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Set deviceNo
     *
     * @param string $deviceNo
     * @return GingerCupUser
     */
    public function setDeviceNo($deviceNo)
    {
        $this->deviceNo = $deviceNo;

        return $this;
    }

    /**
     * Get deviceNo
     *
     * @return string 
     */
    public function getDeviceNo()
    {
        return $this->deviceNo;
    }

    /**
     * Set cityId
     *
     * @param integer $cityId
     * @return GingerCupUser
     */
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;

        return $this;
    }

    /**
     * Get cityId
     *
     * @return integer 
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return GingerCupUser
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}
