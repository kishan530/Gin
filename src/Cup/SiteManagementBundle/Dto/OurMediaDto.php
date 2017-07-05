<?php

namespace Cup\SiteManagementBundle\Dto;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * OurMedias
 */
class OurMediaDto
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     *
     */
    private $mediaName;
    
    /**
     * @var string
     *
     */
    private $newsSubject;
    
    /**
     * @var string
     *
     */
    private $newsDescription;
    
    /**
     * @var string
     *
     */
    private $newsTitle;
    
    /**
     * @var string
     *
     */
    private $newsLink;
    
   
    /**
     * @var string
     *
     */
    private $mediaLogo;
	
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
	public function getMediaName() {
		return $this->mediaName;
	}
	
	/**
	 *
	 * @param
	 *        	$mediaName
	 */
	public function setMediaName($mediaName) {
		$this->mediaName = $mediaName;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getNewsSubject() {
		return $this->newsSubject;
	}
	
	/**
	 *
	 * @param
	 *        	$newsSubject
	 */
	public function setNewsSubject($newsSubject) {
		$this->newsSubject = $newsSubject;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getNewsDescription() {
		return $this->newsDescription;
	}
	
	/**
	 *
	 * @param
	 *        	$newsDescription
	 */
	public function setNewsDescription($newsDescription) {
		$this->newsDescription = $newsDescription;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getMediaLogo() {
		return $this->mediaLogo;
	}
	
	/**
	 *
	 * @param
	 *        	$mediaLogo
	 */
	public function setMediaLogo($mediaLogo) {
		$this->mediaLogo = $mediaLogo;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getNewsTitle() {
		return $this->newsTitle;
	}
	
	/**
	 *
	 * @param
	 *        	$newsTitle
	 */
	public function setNewsTitle($newsTitle) {
		$this->newsTitle = $newsTitle;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getNewsLink() {
		return $this->newsLink;
	}
	
	/**
	 *
	 * @param
	 *        	$newsLink
	 */
	public function setNewsLink($newsLink) {
		$this->newsLink = $newsLink;
		return $this;
	}
	
	
    	
	

	
    
}