<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PreviewImage
 *
 * @ORM\Table(name="PreviewImage")
 * @ORM\Entity
 */
class PreviewImage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PreviewImageId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ImageUrl", type="string", length=500)
     */
    private $imageUrl;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var integer
     *
     * @ORM\Column(name="UserId", type="integer")
     */
    private $UserId;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     * @return PreviewImage
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string 
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return PreviewImage
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set UserId
     *
     * @param integer $userId
     * @return PreviewImage
     */
    public function setUserId($userId)
    {
        $this->UserId = $userId;

        return $this;
    }

    /**
     * Get UserId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->UserId;
    }
}
