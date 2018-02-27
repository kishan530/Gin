<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivityType
 *
 * @ORM\Table(name="activity_type")
 * @ORM\Entity
 */
class ActivityType
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
     * @ORM\Column(name="activity", type="string", length=50)
     */
    private $activity;
    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getActivity() {
		return $this->activity;
	}
	
	/**
	 *
	 * @param
	 *        	$activity
	 */
	public function setActivity($activity) {
		$this->activity = $activity;
		return $this;
	}
	
	
	public function getActive() {
		return $this->active;
	}
	public function setActive($active) {
		$this->active = $active;
		return $this;
	}
	 
}
