<?php

namespace Cup\SiteManagementBundle\Dto;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * OurClients
 */
class OurClientDto
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     *
     */
    private $clientImage;
    
    /**
     * @var string
     *
     */
    private $subject;
    
    /**
     * @var string
     *
     */
    private $description;
    
    /**
     * @var string
     *
     */
    private $clientName;
	
	/**
	 *
	 * @return the int
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
	public function getSubject() {
		return $this->subject;
	}
	
	/**
	 *
	 * @param
	 *        	$subject
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 *
	 * @param
	 *        	$description
	 */
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}
	
	
	/**
	 *
	 * @return the string
	 */
	public function getClientImage() {
		return $this->clientImage;
	}
	
	/**
	 *
	 * @param
	 *        	$clientImage
	 */
	public function setClientImage($clientImage) {
		$this->clientImage = $clientImage;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getClientName() {
		return $this->clientName;
	}
	
	/**
	 *
	 * @param
	 *        	$clientName
	 */
	public function setClientName($clientName) {
		$this->clientName = $clientName;
		return $this;
	}
	
	
	
    
}