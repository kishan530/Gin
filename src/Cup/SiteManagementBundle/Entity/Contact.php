<?php

namespace Cup\SiteManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 *
 * Contact
 * @ORM\Table(name="contact_us")
 * @ORM\Entity
 */
class Contact
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

   /**

     * @var string

     * @ORM\Column(name="name", type="string", length=100)

     * @Assert\Length(max = 100, maxMessage="Your Name cannot contain more then 100")

     * @Assert\Regex(

     *     pattern="/^[a-zA-Z&]+([s ][A-Za-z&]+)*$/",

     *     match=true,

     *     message="Please enter a valid Name"

     * )

     */

    private $name;

    /**

     * @ORM\Column(name="email", type="string", length=100)

     * @Assert\Email(

     *     message = "The email-id '{{ value }}' is not a valid email.",

     *     checkMX = true

     * )

     */

    private $email;



     /**

     * @var string

     * @ORM\Column(name="mobile", type="string", length=100)

     * @Assert\Length(min = 10, max = 15, maxMessage="Your mobile cannot contain more then 15")

     * @Assert\Regex(

     *     pattern="/^([+0-9]{1,3})?([0-9]{10,12})$/i",

     *     message= "Invalid mobile no."

     * )

     */

    private $mobile;

   /**
     * @ORM\Column(name="message", type="string", length=100)
     * @Assert\Length(max = 5000, maxMessage="Your address cannot contain more then 1000 Characters")
     * @var string
     * 
     */
    private $message;

    

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

     * Set name

     *

     * @param string $name

     * @return Contact

     */

    public function setName($name)

    {

        $this->name = $name;



        return $this;

    }



    /**

     * Get name

     *

     * @return string 

     */

    public function getName()

    {

        return $this->name;

    }



     /**

     * Set email

     *

     * @param string $email

     * @return Contact

     */

    public function setEmail($email)

    {

        $this->email = $email;



        return $this;

    }



    /**

     * Get email

     *

     * @return string 

     */

    public function getEmail()

    {

        return $this->email;

    }



    /**

     * Set mobile

     *

     * @param string $mobile

     * @return Contact

     */

    public function setMobile($mobile)

    {

        $this->mobile = $mobile;



        return $this;

    }



    /**

     * Get mobile

     *

     * @return string 

     */

    public function getMobile()

    {

        return $this->mobile;

    }
    
    /**
	 *
	 * @return the string
	 */
	public function getMessage() {
		return $this->message;
	}
	
	/**
	 *
	 * @param
	 *        	$message
	 */
	public function setMessage($message) {
		$this->message = $message;
		return $this;
	}



    
    
}