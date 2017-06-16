<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeliveryDetail
 *
 * @ORM\Table(name="delivery_detail")
 * @ORM\Entity(repositoryClass="Cup\SiteManagementBundle\Repository\DeliveryDetailRepository")
 */
class DeliveryDetail
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
     * @ORM\Column(name="no_of_orders_per_day", type="integer")
     */
    private $noOfOrders;

    /**
     * @var float
     *
     * @ORM\Column(name="average_price_per_day", type="float")
     */
    private $averagePrice;

    /**
     * @var int
     *
     * @ORM\Column(name="minimum_order_size", type="integer")
     */
    private $minimumOrder;


    /**
     * @var bool
     *
     * @ORM\Column(name="daily_subscription", type="boolean")
     */
    private $dailySubscription;

    /**
     * @var bool
     *
     * @ORM\Column(name="weekly_subscription", type="boolean")
     */
    private $weeklySubscription;

    /**
     * @var bool
     *
     * @ORM\Column(name="monthly_subscription", type="boolean")
     */
    private $monthlySubscription;

    /**
     * @var int
     *
     * @ORM\Column(name="daily_subscription_no_of_orders", type="integer")
     */
    private $dailySubscriptionNoOfOrders;

    /**
     * @var int
     *
     * @ORM\Column(name="weekly_subscription_no_of_orders", type="integer")
     */
    private $weeklySubscriptionNoOfOrders;

    /**
     * @var int
     *
     * @ORM\Column(name="monthly_subscription_no_of_orders", type="integer")
     */
    private $monthlySubscriptionNoOfOrders;

    /**
     * @var int
     *
     * @ORM\Column(name="city", type="integer")
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=5000)
     */
    private $note;
    /**
     * @ORM\ManyToOne(targetEntity="Cup\SiteManagementBundle\Entity\DeliveryPartner", inversedBy="detail")
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
     * Set noOfOrders
     *
     * @param integer $noOfOrders
     *
     * @return DeliveryDetail
     */
    public function setNoOfOrders($noOfOrders)
    {
        $this->noOfOrders = $noOfOrders;

        return $this;
    }

    /**
     * Get noOfOrders
     *
     * @return int
     */
    public function getNoOfOrders()
    {
        return $this->noOfOrders;
    }

    /**
     * Set averagePrice
     *
     * @param float $averagePrice
     *
     * @return DeliveryDetail
     */
    public function setAveragePrice($averagePrice)
    {
        $this->averagePrice = $averagePrice;

        return $this;
    }

    /**
     * Get averagePrice
     *
     * @return float
     */
    public function getAveragePrice()
    {
        return $this->averagePrice;
    }

    /**
     * Set minimumOrder
     *
     * @param integer $minimumOrder
     *
     * @return DeliveryDetail
     */
    public function setMinimumOrder($minimumOrder)
    {
        $this->minimumOrder = $minimumOrder;

        return $this;
    }

    /**
     * Get minimumOrder
     *
     * @return int
     */
    public function getMinimumOrder()
    {
        return $this->minimumOrder;
    }



    /**
     * Set dailySubscription
     *
     * @param boolean $dailySubscription
     *
     * @return DeliveryDetail
     */
    public function setDailySubscription($dailySubscription)
    {
        $this->dailySubscription = $dailySubscription;

        return $this;
    }

    /**
     * Get dailySubscription
     *
     * @return bool
     */
    public function getDailySubscription()
    {
        return $this->dailySubscription;
    }

    /**
     * Set weeklySubscription
     *
     * @param boolean $weeklySubscription
     *
     * @return DeliveryDetail
     */
    public function setWeeklySubscription($weeklySubscription)
    {
        $this->weeklySubscription = $weeklySubscription;

        return $this;
    }

    /**
     * Get weeklySubscription
     *
     * @return bool
     */
    public function getWeeklySubscription()
    {
        return $this->weeklySubscription;
    }

    /**
     * Set monthlySubscription
     *
     * @param boolean $monthlySubscription
     *
     * @return DeliveryDetail
     */
    public function setMonthlySubscription($monthlySubscription)
    {
        $this->monthlySubscription = $monthlySubscription;

        return $this;
    }

    /**
     * Get monthlySubscription
     *
     * @return bool
     */
    public function getMonthlySubscription()
    {
        return $this->monthlySubscription;
    }

    /**
     * Set dailySubscriptionNoOfOrders
     *
     * @param integer $dailySubscriptionNoOfOrders
     *
     * @return DeliveryDetail
     */
    public function setDailySubscriptionNoOfOrders($dailySubscriptionNoOfOrders)
    {
        $this->dailySubscriptionNoOfOrders = $dailySubscriptionNoOfOrders;

        return $this;
    }

    /**
     * Get dailySubscriptionNoOfOrders
     *
     * @return int
     */
    public function getDailySubscriptionNoOfOrders()
    {
        return $this->dailySubscriptionNoOfOrders;
    }

    /**
     * Set weeklySubscriptionNoOfOrders
     *
     * @param integer $weeklySubscriptionNoOfOrders
     *
     * @return DeliveryDetail
     */
    public function setWeeklySubscriptionNoOfOrders($weeklySubscriptionNoOfOrders)
    {
        $this->weeklySubscriptionNoOfOrders = $weeklySubscriptionNoOfOrders;

        return $this;
    }

    /**
     * Get weeklySubscriptionNoOfOrders
     *
     * @return int
     */
    public function getWeeklySubscriptionNoOfOrders()
    {
        return $this->weeklySubscriptionNoOfOrders;
    }

    /**
     * Set monthlySubscriptionNoOfOrders
     *
     * @param integer $monthlySubscriptionNoOfOrders
     *
     * @return DeliveryDetail
     */
    public function setMonthlySubscriptionNoOfOrders($monthlySubscriptionNoOfOrders)
    {
        $this->monthlySubscriptionNoOfOrders = $monthlySubscriptionNoOfOrders;

        return $this;
    }

    /**
     * Get monthlySubscriptionNoOfOrders
     *
     * @return int
     */
    public function getMonthlySubscriptionNoOfOrders()
    {
        return $this->monthlySubscriptionNoOfOrders;
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
     * Set note
     *
     * @param string $note
     *
     * @return DeliveryDetail
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

