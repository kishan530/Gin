<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeliveryDay
 *
 * @ORM\Table(name="delivery_day")
 * @ORM\Entity(repositoryClass="Cup\SiteManagementBundle\Repository\DeliveryDayRepository")
 */
class DeliveryDay
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
     * @ORM\Column(name="day", type="string", length=50)
     */
    private $day;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    /**
     * @ORM\ManyToOne(targetEntity="Cup\SiteManagementBundle\Entity\DeliveryPartner", inversedBy="deliveryDay")
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
     * Set day
     *
     * @param string $day
     *
     * @return DeliveryDay
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return DeliveryDay
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
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

