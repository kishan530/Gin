<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OurMedia
 *
 * @ORM\Table(name="our_media")
 * @ORM\Entity
 */
class OurMedia
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
	 * @ORM\Column(name="mediaName", type="string", length=500)
	 */
	private $mediaName;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="newsSubject", type="string")
	 */
	private $newsSubject;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="newsDescription", type="string")
	 */
	private $newsDescription;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="newsTitle", type="string")
	 */
	private $newsTitle;
	
	/**
	* @var string
	*
	* @ORM\Column(name="newsLink", type="string")
	*/
	private $newsLink;
	/**
	 * @var string
	 *
	 * @ORM\Column(name="alt_text", type="string")
	 */
	private $altText;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="mediaLogo", type="string")
	 */
	private $mediaLogo;
	
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
	public function getAltText() {
		return $this->altText;
	}
	public function setAltText($altText) {
		$this->altText = $altText;
		return $this;
	}
	
	
	
	
	
	
	
	
}