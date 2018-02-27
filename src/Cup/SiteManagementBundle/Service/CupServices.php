<?php

namespace  Cup\SiteManagementBundle\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManager;
/**
 * This is an Adoptor for booking engine server.    
 *
 */
class CupServices
{
	private $container;
	private $em;
	private $session;
	private $logger;
	
	/**
	 * Constructor 
	 * @param EntityManager $entityManager
	 * @param ContainerInterface $container
	 * @param unknown $session
	 */
	public function __construct(EntityManager $entityManager,ContainerInterface $container,$session)
	{
		$this->session = $session;
		$this->container = $container;
        $this->em = $entityManager;
		$this->logger = $this->container->get('logger');
    }
     public function getCity(){
        $locations = $this->em->getRepository('CupSiteManagementBundle:City')->findBy(array(),array('name'=>'ASC'));
        return $locations;
    }
     public function getEstubTypes(){
        $locations = $this->em->getRepository('CupSiteManagementBundle:EstabType')->findBy(array(),array('typeName'=>'ASC'));
        return $locations;
    }
	public function getActivityTypes(){
        $locations = $this->em->getRepository('CupSiteManagementBundle:ActivityType')->findBy(array(),array('id'=>'ASC'));
        return $locations;
    }
     public function getLocation(){
        $locations = $this->em->getRepository('CupSiteManagementBundle:Location')->findAll();
        return $locations;
    }
     public function getLocationByCity($city){
        $locations = $this->em->getRepository('CupSiteManagementBundle:Location')->findBy(array('city'=>$city),array('name'=>'ASC'));
         // $dql3 = "SELECT l FROM CupSiteManagementBundle:Location l where l.city in $city";
         //echo $dql3;
         //exit();
            //$query = $this->em->createQuery($dql3);					
            //$locations = $query->getResult();
        return $locations;
    }
    public function getLocationByCityWithReach($city){
       // $locations = $this->em->getRepository('CupSiteManagementBundle:Location')->findBy(array('city'=>$city),array('name'=>'ASC'));
          $dql3 = "SELECT l.id,l.name,sum(c.reach) noOfReach FROM CupSiteManagementBundle:Location l, CupSiteManagementBundle:Consumer c where c.location=l.id and l.city=$city group by l.id";
            $query = $this->em->createQuery($dql3);					
            $locations = $query->getResult();
       // echo var_dump($locations);
        //exit();
        return $locations;
    }
    public function getAllPartner(){
        $locations = $this->em->getRepository('CupSiteManagementBundle:DeliveryDetail')->findAll();
        return $locations;
    }
    public function getPartnerByCity($city){
        $locations = $this->em->getRepository('CupSiteManagementBundle:DeliveryDetail')->findBy(array('city'=>$city),array('city'=>'ASC'));
        return $locations;
    }
     public function getUsers(){
        $locations = $this->em->getRepository('CupSiteManagementBundle:GingerCupUser')->findBy(array('userType'=>4));
         // $dql3 = "SELECT l FROM CupSiteManagementBundle:Location l where l.city in $city";
         //echo $dql3;
         //exit();
            //$query = $this->em->createQuery($dql3);					
            //$locations = $query->getResult();
        return $locations;
    }
    public function getReachByLocation(){
            $dql3 = "SELECT c.location,Sum(c.cupQuantityPerDay) quantity,Sum(c.reach) reach FROM CupSiteManagementBundle:Consumer c Group By c.location";
           // $em = $this->getDoctrine()->getManager();
            $query = $this->em->createQuery($dql3);					
            $result = $query->getResult();
         return $result;        
     }
   
	
}
