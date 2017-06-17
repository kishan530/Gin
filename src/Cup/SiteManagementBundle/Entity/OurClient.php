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
	
	
	
	
}