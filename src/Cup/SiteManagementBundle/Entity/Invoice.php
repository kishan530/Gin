<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity
 */
class Invoice
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
     * @ORM\Column(name="invoice_title", type="string", length=100)
     */
    private $invoiceTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="invoice_no", type="string", length=100)
     */
    private $invoiceNo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="invoice_date", type="date")
     */
    private $invoiceDate;
    /**
     * @var string
     *
     * @ORM\Column(name="mode_payment", type="string", length=100)
     */
    private $modePayment;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_note", type="string", length=200)
     */
    private $deliveryNote;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="delivery_note_date", type="date")
     */
    private $deliveryNoteDate;

    /**
     * @var string
     *
     * @ORM\Column(name="supplier_ref", type="string", length=100)
     */
    private $supplierRef;
    

    /**
     * @var string
     *
     * @ORM\Column(name="other_ref", type="string", length=100)
     */
    private $otherRef;
    
    /**
     * @var string
     *
     * @ORM\Column(name="seller_name", type="string", length=100)
     */
    private $sellerName;
    /**
     * @var string
     *
     * @ORM\Column(name="seller_address_line1", type="string", length=3000)
     */
    private $sellerAddress;
        /**
     * @var string
     *
     * @ORM\Column(name="seller_address_line2", type="string", length=3000)
     */
    private $sellerAddress2;
    /**
     * @var string
     *
     * @ORM\Column(name="seller_TIN", type="string", length=80)
     */
    private $sellerTIN;
        /**
     * @var string
     *
     * @ORM\Column(name="seller_service_tax_no", type="string", length=80)
     */
    private $sellerTaxNo;
        /**
     * @var string
     *
     * @ORM\Column(name="seller_PAN", type="string", length=80)
     */
    private $sellerPAN;

    /**
     * @var string
     *
     * @ORM\Column(name="buyer_name", type="string", length=100)
     */
    private $buyerName;

    /**
     * @var string
     *
     * @ORM\Column(name="buyer_email", type="string", length=250)
     * @Assert\Email(

     *     message = "The email-id '{{ value }}' is not a valid email.",

     *     checkMX = true

     * )
     */
    private $buyerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="buyer_address_line1", type="string", length=3000)
     */
    private $buyerAddress;
            /**
     * @var string
     *
     * @ORM\Column(name="buyer_address_line2", type="string", length=3000)
     */
    private $buyerAddress2;

    /**
     * @var string
     *
     * @ORM\Column(name="buyer_order_no", type="string", length=100)
     */
    private $buyerOrderNo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="buyer_order_date", type="date")
     */
    private $buyerOrderDate;

    /**
     * @var string
     *
     * @ORM\Column(name="despatch_no", type="string", length=100)
     */
    private $despatchNo;

    /**
     * @var string
     *
     * @ORM\Column(name="despatch_through", type="string", length=100)
     */
    private $despatchThrough;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=500)
     */
    private $destination;

    /**
     * @var string
     *
     * @ORM\Column(name="terms_of_delivery", type="string", length=5000)
     */
    private $termsOfDelivery;

    /**
     * @var float
     *
     * @ORM\Column(name="service_tax", type="float")
     */
    private $serviceTax;

    /**
     * @var float
     *
     * @ORM\Column(name="swach_bharth_cess", type="float")
     */
    private $swachBharthCess;

    /**
     * @var float
     *
     * @ORM\Column(name="krishi_kalyan_cess", type="float")
     */
    private $krishiKalyanCess;
     /**
     * @var float
     *
     * @ORM\Column(name="service_tax_per", type="float")
     */
    private $serviceTaxPer;

    /**
     * @var float
     *
     * @ORM\Column(name="swach_bharth_cess_per", type="float")
     */
    private $swachBharthCessPer;

    /**
     * @var float
     *
     * @ORM\Column(name="krishi_kalyan_cess_per", type="float")
     */
    private $krishiKalyanCessPer;


    /**
     * @var float
     *
     * @ORM\Column(name="rounding_off", type="float")
     */
    private $roundingOff;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;

    /**
     * @var string
     *
     * @ORM\Column(name="total_in_words", type="string", length=1000)
     */
    private $totalInWords;
    /**
     * @var string
     *
     */
    private $sendMail;
    
    
    
    /**
     * @ORM\OneToMany(targetEntity="Cup\SiteManagementBundle\Entity\InvoiceItem", mappedBy="invoice", cascade={"all"})
     */
    private $item;
    
    /**
     * @ORM\OneToMany(targetEntity="Cup\SiteManagementBundle\Entity\InvoiceTerm", mappedBy="invoice", cascade={"all"})
     */
    private $terms;
    
    /**
    *constructor
    *
    */
     public function __construct() {
    	$this->item = new ArrayCollection();
    	$this->terms = new ArrayCollection();
     }
	
	/**
	 *
	 * @return the integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 *
	 * @param
	 *        	$id
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getInvoiceTitle() {
		return $this->invoiceTitle;
	}
	
	/**
	 *
	 * @param
	 *        	$invoiceTitle
	 */
	public function setInvoiceTitle($invoiceTitle) {
		$this->invoiceTitle = $invoiceTitle;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getInvoiceNo() {
		return $this->invoiceNo;
	}
	
	/**
	 *
	 * @param
	 *        	$invoiceNo
	 */
	public function setInvoiceNo($invoiceNo) {
		$this->invoiceNo = $invoiceNo;
		return $this;
	}
	
	/**
	 *
	 * @return the DateTime
	 */
	public function getInvoiceDate() {
		return $this->invoiceDate;
	}
	
	/**
	 *
	 * @param
	 *        	$invoiceDate
	 */
	public function setInvoiceDate($invoiceDate) {
		$this->invoiceDate = $invoiceDate;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getModePayment() {
		return $this->modePayment;
	}
	
	/**
	 *
	 * @param
	 *        	$modePayment
	 */
	public function setModePayment($modePayment) {
		$this->modePayment = $modePayment;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getDeliveryNote() {
		return $this->deliveryNote;
	}
	
	/**
	 *
	 * @param
	 *        	$deliveryNote
	 */
	public function setDeliveryNote($deliveryNote) {
		$this->deliveryNote = $deliveryNote;
		return $this;
	}
	
	/**
	 *
	 * @return the DateTime
	 */
	public function getDeliveryNoteDate() {
		return $this->deliveryNoteDate;
	}
	
	/**
	 *
	 * @param
	 *        	$deliveryNoteDate
	 */
	public function setDeliveryNoteDate($deliveryNoteDate) {
		$this->deliveryNoteDate = $deliveryNoteDate;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getSupplierRef() {
		return $this->supplierRef;
	}
	
	/**
	 *
	 * @param
	 *        	$supplierRef
	 */
	public function setSupplierRef($supplierRef) {
		$this->supplierRef = $supplierRef;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getOtherRef() {
		return $this->otherRef;
	}
	
	/**
	 *
	 * @param
	 *        	$otherRef
	 */
	public function setOtherRef($otherRef) {
		$this->otherRef = $otherRef;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getSellerName() {
		return $this->sellerName;
	}
	
	/**
	 *
	 * @param
	 *        	$sellerName
	 */
	public function setSellerName($sellerName) {
		$this->sellerName = $sellerName;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getSellerAddress() {
		return $this->sellerAddress;
	}
	
	/**
	 *
	 * @param
	 *        	$sellerAddress
	 */
	public function setSellerAddress($sellerAddress) {
		$this->sellerAddress = $sellerAddress;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getSellerAddress2() {
		return $this->sellerAddress2;
	}
	
	/**
	 *
	 * @param
	 *        	$sellerAddress2
	 */
	public function setSellerAddress2($sellerAddress2) {
		$this->sellerAddress2 = $sellerAddress2;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getSellerTIN() {
		return $this->sellerTIN;
	}
	
	/**
	 *
	 * @param
	 *        	$sellerTIN
	 */
	public function setSellerTIN($sellerTIN) {
		$this->sellerTIN = $sellerTIN;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getSellerTaxNo() {
		return $this->sellerTaxNo;
	}
	
	/**
	 *
	 * @param
	 *        	$sellerTaxNo
	 */
	public function setSellerTaxNo($sellerTaxNo) {
		$this->sellerTaxNo = $sellerTaxNo;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getSellerPAN() {
		return $this->sellerPAN;
	}
	
	/**
	 *
	 * @param
	 *        	$sellerPAN
	 */
	public function setSellerPAN($sellerPAN) {
		$this->sellerPAN = $sellerPAN;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getBuyerName() {
		return $this->buyerName;
	}
	
	/**
	 *
	 * @param
	 *        	$buyerName
	 */
	public function setBuyerName($buyerName) {
		$this->buyerName = $buyerName;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getBuyerEmail() {
		return $this->buyerEmail;
	}
	
	/**
	 *
	 * @param
	 *        	$buyerEmail
	 */
	public function setBuyerEmail($buyerEmail) {
		$this->buyerEmail = $buyerEmail;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getBuyerAddress() {
		return $this->buyerAddress;
	}
	
	/**
	 *
	 * @param
	 *        	$buyerAddress
	 */
	public function setBuyerAddress($buyerAddress) {
		$this->buyerAddress = $buyerAddress;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getBuyerAddress2() {
		return $this->buyerAddress2;
	}
	
	/**
	 *
	 * @param
	 *        	$buyerAddress2
	 */
	public function setBuyerAddress2($buyerAddress2) {
		$this->buyerAddress2 = $buyerAddress2;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getBuyerOrderNo() {
		return $this->buyerOrderNo;
	}
	
	/**
	 *
	 * @param
	 *        	$buyerOrderNo
	 */
	public function setBuyerOrderNo($buyerOrderNo) {
		$this->buyerOrderNo = $buyerOrderNo;
		return $this;
	}
	
	/**
	 *
	 * @return the DateTime
	 */
	public function getBuyerOrderDate() {
		return $this->buyerOrderDate;
	}
	
	/**
	 *
	 * @param
	 *        	$buyerOrderDate
	 */
	public function setBuyerOrderDate($buyerOrderDate) {
		$this->buyerOrderDate = $buyerOrderDate;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getDespatchNo() {
		return $this->despatchNo;
	}
	
	/**
	 *
	 * @param
	 *        	$despatchNo
	 */
	public function setDespatchNo($despatchNo) {
		$this->despatchNo = $despatchNo;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getDespatchThrough() {
		return $this->despatchThrough;
	}
	
	/**
	 *
	 * @param
	 *        	$despatchThrough
	 */
	public function setDespatchThrough($despatchThrough) {
		$this->despatchThrough = $despatchThrough;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getDestination() {
		return $this->destination;
	}
	
	/**
	 *
	 * @param
	 *        	$destination
	 */
	public function setDestination($destination) {
		$this->destination = $destination;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getTermsOfDelivery() {
		return $this->termsOfDelivery;
	}
	
	/**
	 *
	 * @param
	 *        	$termsOfDelivery
	 */
	public function setTermsOfDelivery($termsOfDelivery) {
		$this->termsOfDelivery = $termsOfDelivery;
		return $this;
	}
	
	/**
	 *
	 * @return the float
	 */
	public function getServiceTax() {
		return $this->serviceTax;
	}
	
	/**
	 *
	 * @param
	 *        	$serviceTax
	 */
	public function setServiceTax($serviceTax) {
		$this->serviceTax = $serviceTax;
		return $this;
	}
	
	/**
	 *
	 * @return the float
	 */
	public function getSwachBharthCess() {
		return $this->swachBharthCess;
	}
	
	/**
	 *
	 * @param
	 *        	$swachBharthCess
	 */
	public function setSwachBharthCess($swachBharthCess) {
		$this->swachBharthCess = $swachBharthCess;
		return $this;
	}
	
	/**
	 *
	 * @return the float
	 */
	public function getKrishiKalyanCess() {
		return $this->krishiKalyanCess;
	}
	
	/**
	 *
	 * @param
	 *        	$krishiKalyanCess
	 */
	public function setKrishiKalyanCess($krishiKalyanCess) {
		$this->krishiKalyanCess = $krishiKalyanCess;
		return $this;
	}
	
	/**
	 *
	 * @return the float
	 */
	public function getServiceTaxPer() {
		return $this->serviceTaxPer;
	}
	
	/**
	 *
	 * @param
	 *        	$serviceTaxPer
	 */
	public function setServiceTaxPer($serviceTaxPer) {
		$this->serviceTaxPer = $serviceTaxPer;
		return $this;
	}
	
	/**
	 *
	 * @return the float
	 */
	public function getSwachBharthCessPer() {
		return $this->swachBharthCessPer;
	}
	
	/**
	 *
	 * @param
	 *        	$swachBharthCessPer
	 */
	public function setSwachBharthCessPer($swachBharthCessPer) {
		$this->swachBharthCessPer = $swachBharthCessPer;
		return $this;
	}
	
	/**
	 *
	 * @return the float
	 */
	public function getKrishiKalyanCessPer() {
		return $this->krishiKalyanCessPer;
	}
	
	/**
	 *
	 * @param
	 *        	$krishiKalyanCessPer
	 */
	public function setKrishiKalyanCessPer($krishiKalyanCessPer) {
		$this->krishiKalyanCessPer = $krishiKalyanCessPer;
		return $this;
	}
	
	/**
	 *
	 * @return the float
	 */
	public function getRoundingOff() {
		return $this->roundingOff;
	}
	
	/**
	 *
	 * @param
	 *        	$roundingOff
	 */
	public function setRoundingOff($roundingOff) {
		$this->roundingOff = $roundingOff;
		return $this;
	}
	
	/**
	 *
	 * @return the float
	 */
	public function getTotal() {
		return $this->total;
	}
	
	/**
	 *
	 * @param
	 *        	$total
	 */
	public function setTotal($total) {
		$this->total = $total;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getTotalInWords() {
		return $this->totalInWords;
	}
	
	/**
	 *
	 * @param
	 *        	$totalInWords
	 */
	public function setTotalInWords($totalInWords) {
		$this->totalInWords = $totalInWords;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getSendMail() {
		return $this->sendMail;
	}
	
	/**
	 *
	 * @param
	 *        	$sendMail
	 */
	public function setSendMail($sendMail) {
		$this->sendMail = $sendMail;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getItem() {
		return $this->item;
	}
	
	/**
	 *
	 * @param unknown_type $item        	
	 */
	public function setItem($item) {
		$this->item = $item;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getTerms() {
		return $this->terms;
	}
	
	/**
	 *
	 * @param unknown_type $terms        	
	 */
	public function setTerms($terms) {
		$this->terms = $terms;
		return $this;
	}
	
	
	

   
}
