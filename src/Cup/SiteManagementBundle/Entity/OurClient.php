<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OurClient
 *
 * @ORM\Table(name="our_clients")
 * @ORM\Entity
 */
class OurClient
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
	 * @ORM\Column(name="client_image", type="string", length=500)
	 */
	private $clientImage;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="subject", type="string")
	 */
	private $subject;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="string")
	 */
	private $description;
	/**
	 * @var string
	 *
	 * @ORM\Column(name="client_name", type="string")
	 */
	private $clientName;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="story_title", type="string")
	 */
	private $storyTitle;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="story_description", type="string")
	 */
	private $storyDescription;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="story_image", type="string")
	 */
	private $storyImage;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="active", type="boolean")
	 */
	private $active;
	
	
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