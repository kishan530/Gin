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
     * @var string
     *
     */
    private $storyTitle;
    
    /**
     * @var string
     *
     */
    private $storyDescription;
    
    /**
     * @var string
     *
     */
    private $storyImage;
    
    /**
     * @var boolean
     *
     */
    private $active;
	
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
	
	/**
	 *
	 * @return the string
	 */
	public function getStoryTitle() {
		return $this->storyTitle;
	}
	
	/**
	 *
	 * @param
	 *        	$storyTitle
	 */
	public function setStoryTitle($storyTitle) {
		$this->storyTitle = $storyTitle;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getStoryDescription() {
		return $this->storyDescription;
	}
	
	/**
	 *
	 * @param
	 *        	$storyDescription
	 */
	public function setStoryDescription($storyDescription) {
		$this->storyDescription = $storyDescription;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getStoryImage() {
		return $this->storyImage;
	}
	
	/**
	 *
	 * @param
	 *        	$storyImage
	 */
	public function setStoryImage($storyImage) {
		$this->storyImage = $storyImage;
		return $this;
	}
	
	/**
	 *
	 * @return the boolean
	 */
	public function getActive() {
		return $this->active;
	}
	
	/**
	 *
	 * @param
	 *        	$active
	 */
	public function setActive($active) {
		$this->active = $active;
		return $this;
	}
	

	
    
}