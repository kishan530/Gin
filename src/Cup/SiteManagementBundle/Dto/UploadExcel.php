<?php
namespace Cup\SiteManagementBundle\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * This is a DTO to hold the data of BulkFileUpload in application.
 */
class UploadExcel
{

    /**
     * @var string
     */
    private $filePath;
    /**
     * @var integer
     *
     */
    private $city;
    /**
     * Set filePath
     *
     * @param string $filePath
     * @return UploadExcel
     */
    public function setFilePath($filePath)
    {
    	$this->filePath = $filePath;
    
    	return $this;
    }
    
    /**
     * Get filePath
     *
     * @return string
     */
    public function getFilePath()
    {
    	return $this->filePath;
    }
    
     /**
     * Set city
     *
     * @param integer $city
     * @return CampaignLocation
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return integer 
     */
    public function getCity()
    {
        return $this->city;
    }

}
?>