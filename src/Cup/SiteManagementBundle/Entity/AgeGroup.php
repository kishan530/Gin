<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AgeGroup
 *
 * @ORM\Table(name="age_group")
 * @ORM\Entity(repositoryClass="Cup\SiteManagementBundle\Repository\AgeGroupRepository")
 */
class AgeGroup
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
     * @ORM\Column(name="age_group", type="string", length=50)
     */
    private $ageGroup;
       /**
     * @ORM\ManyToOne(targetEntity="Cup\SiteManagementBundle\Entity\DeliveryPartner", inversedBy="ageGroup")
     * @ORM\JoinColumn(name="delivery_partner_id", referencedColumnName="id")
     */
    private $partner;


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
     * Set ageGroup
     *
     * @param string $ageGroup
     *
     * @return AgeGroup
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

