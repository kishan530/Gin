<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * GalleryCollection
 *
 * @ORM\Table(name="gallery_collection")
 * @ORM\Entity
 */
class GalleryCollection
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
	 * @ORM\Column(name="name", type="string")
	 */
	private $name;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="image_path", type="string")
	 */
	private $imagePath;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="banner_image", type="string")
	 */
	private $bannerImage;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="url", type="string")
	 */
	private $url;
	
	/**
	 * @var Collection
	 * @ORM\OneToMany(targetEntity="Cup\SiteManagementBundle\Entity\GalleryImages", mappedBy="collectionId", cascade={"all"})
	 */
	protected $galleryImages;
	
	/**
	 *
	 */
	public function __construct() {
		
		$this->galleryImages = new ArrayCollection();
	
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
	 * @return the Collection
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