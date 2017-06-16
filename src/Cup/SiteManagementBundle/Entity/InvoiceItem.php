<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceItem
 *
 * @ORM\Table(name="invoice_items")
 * @ORM\Entity
 */
class InvoiceItem
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
     * @ORM\Column(name="description", type="string", length=100)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(name="rate", type="float")
     */
    private $rate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_percentage", type="boolean")
     */
    private $isPercentage;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity="Cup\SiteManagementBundle\Entity\Invoice", inversedBy="item")
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id")
     */
    private $invoice;


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
     * Set description
     *
     * @param string $description
     * @return InvoiceItem
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return InvoiceItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set rate
     *
     * @param float $rate
     * @return InvoiceItem
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return float 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set isPercentage
     *
     * @param boolean $isPercentage
     * @return InvoiceItem
     */
    public function setIsPercentage($isPercentage)
    {
        $this->isPercentage = $isPercentage;

        return $this;
    }

    /**
     * Get isPercentage
     *
     * @return boolean 
     */
    public function getIsPercentage()
    {
        return $this->isPercentage;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return InvoiceItem
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set invoice
     *
     * @param integer $invoice
     * @return InvoiceItem
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return integer 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }
}
