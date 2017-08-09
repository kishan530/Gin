<?php

namespace Cup\SiteManagementBundle\Dto;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * GalleryCollections
 */
class GalleryCollectionDto
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
    private $bannerImage;
    
    /**
     * @var string
     *
     */
    private $url;
    
    /**
     * @var string
     *
     */
    protected $galleryImages;
    
    /**
     * @var Collection
     *
     */
    protected $imageList;
    
    public function __construct() {
    	
    	$this->galleryImages = new ArrayCollection();
    	$this->imageList = new ArrayCollection();
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
	public function getBannerImage() {
		return $this->bannerImage;
	}
	
	/**
	 *
	 * @param
	 *        	$bannerImage
	 */
	public function setBannerImage($bannerImage) {
		$this->bannerImage = $bannerImage;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getGalleryImages() {
		return $this->galleryImages;
	}
	
	/**
	 *
	 * @param
	 *        	$galleryImages
	 */
	public function setGalleryImages($galleryImages) {
		$this->galleryImages = $galleryImages;
		return $this;
	}
	
	/**
	 *
	 * @return the Collection
	 */
	public function getImageList() {
		return $this->imageList;
	}
	
	/**
	 *
	 * @param
	 *        	$imageList
	 */
	public function setImageList($imageList) {
		$this->imageList = $imageList;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getUrl() {
		return $this->url;
	}
	
	/**
	 *
	 * @param
	 *        	$url
	 */
	public function setUrl($url) {
		$this->url = $url;
		return $this;
	}
	
	
	
 
	
    
}