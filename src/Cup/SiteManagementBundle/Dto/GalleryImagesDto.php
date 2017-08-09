<?php

namespace Cup\SiteManagementBundle\Dto;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * GalleryImage
 */
class GalleryImagesDto
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     *
     */
    private $name;
    
    /**
     * @var string
     *
     */
    private $imagePath;
    
    /**
     * @var string
     *
     */
    private $collectionId;
	
       
    public function __construct() {
    	
    	$this->galleryImage = new ArrayCollection();
    }
	
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
	public function getName() {
		return $this->name;
	}
	
	/**
	 *
	 * @param
	 *        	$name
	 */
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getImagePath() {
		return $this->imagePath;
	}
	
	/**
	 *
	 * @param
	 *        	$imagePath
	 */
	public function setImagePath($imagePath) {
		$this->imagePath = $imagePath;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCollectionId() {
		return $this->collectionId;
	}
	
	/**
	 *
	 * @param
	 *        	$collectionId
	 */
	public function setCollectionId($collectionId) {
		$this->collectionId = $collectionId;
		return $this;
	}
	
	
 
	
    
}