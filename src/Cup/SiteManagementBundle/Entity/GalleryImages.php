<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * GalleryImages
 *
 * @ORM\Table(name="gallery_images")
 * @ORM\Entity
 */
class GalleryImages
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
	 * @ORM\ManyToOne(targetEntity="Cup\SiteManagementBundle\Entity\GalleryCollection", inversedBy="images")
	 * @ORM\JoinColumn(name="collection_id", referencedColumnName="id")
	 */
	protected $collectionId;
	
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
	 * @return the unknown_type
	 */
	public function getCollectionId() {
		return $this->collectionId;
	}
	
	/**
	 *
	 * @param unknown_type $collectionId        	
	 */
	public function setCollectionId($collectionId) {
		$this->collectionId = $collectionId;
		return $this;
	}
	

	
}