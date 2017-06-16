<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IncomeGroup
 *
 * @ORM\Table(name="income_group")
 * @ORM\Entity(repositoryClass="Cup\SiteManagementBundle\Repository\IncomeGroupRepository")
 */
class IncomeGroup
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
     * @ORM\Column(name="income_group", type="string", length=50)
     */
    private $incomeGroup;
       /**
     * @ORM\ManyToOne(targetEntity="Cup\SiteManagementBundle\Entity\DeliveryPartner", inversedBy="incomeGroup")
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
     * Set incomeGroup
     *
     * @param string $incomeGroup
     *
     * @return IncomeGroup
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

