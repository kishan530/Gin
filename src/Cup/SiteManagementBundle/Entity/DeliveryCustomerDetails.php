<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeliveryCustomerDetails
 *
 * @ORM\Table(name="delivery_partner_customer_details")
 * @ORM\Entity(repositoryClass="Cup\SiteManagementBundle\Repository\DeliveryCustomerDetailsRepository")
 */
class DeliveryCustomerDetails
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
     * @var int
     *
     * @ORM\Column(name="sex_ratio", type="integer")
     */
    private $sexRatio;

    /**
     * @var int
     *
     * @ORM\Column(name="married_to_bachelor_ratio", type="integer")
     */
    private $marriedToBachelorRatio;

    /**
     * @var string
     */
    private $ageGroup;
        /**
     * @var string
     */
    private $incomeGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=5000)
     */
    private $note;
       /**
     * @ORM\ManyToOne(targetEntity="Cup\SiteManagementBundle\Entity\DeliveryPartner", inversedBy="customerDetail")
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
     * Set sexRatio
     *
     * @param integer $sexRatio
     *
     * @return DeliveryCustomerDetails
     */
    public function setSexRatio($sexRatio)
    {
        $this->sexRatio = $sexRatio;

        return $this;
    }

    /**
     * Get sexRatio
     *
     * @return int
     */
    public function getSexRatio()
    {
        return $this->sexRatio;
    }

    /**
     * Set marriedToBachelorRatio
     *
     * @param integer $marriedToBachelorRatio
     *
     * @return DeliveryCustomerDetails
     */
    public function setMarriedToBachelorRatio($marriedToBachelorRatio)
    {
        $this->marriedToBachelorRatio = $marriedToBachelorRatio;

        return $this;
    }

    /**
     * Get marriedToBachelorRatio
     *
     * @return int
     */
    public function getMarriedToBachelorRatio()
    {
        return $this->marriedToBachelorRatio;
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

    /**
     * Set note
     *
     * @param string $note
     *
     * @return DeliveryCustomerDetails
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

