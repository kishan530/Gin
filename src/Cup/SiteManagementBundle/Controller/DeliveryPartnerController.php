<?php

namespace Cup\SiteManagementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cup\SiteManagementBundle\Form\ContactSearchType;
use Cup\SiteManagementBundle\Dto\ContactSearchDto;
use Cup\SiteManagementBundle\Entity\DeliveryPartner;
use Cup\SiteManagementBundle\Form\DeliveryPartnerType;
use Cup\SiteManagementBundle\Entity\CampaignRequest;
use Cup\SiteManagementBundle\Form\CampaignPlanType;
use Cup\SiteManagementBundle\Form\CampaignDateType;
use Cup\SiteManagementBundle\Form\UploadDesignType;
use Cup\SiteManagementBundle\Form\CampaignRequestType;
use Cup\SiteManagementBundle\Entity\Contact;
use Cup\SiteManagementBundle\Form\ContactType;
use Cup\SiteManagementBundle\Dto\SelectCity;
use Cup\SiteManagementBundle\Entity\CampaignCity;
use Cup\SiteManagementBundle\Form\CityCollectionType;
use Cup\SiteManagementBundle\Dto\SelectLocation;
use Cup\SiteManagementBundle\Dto\SelectPartner;
use Cup\SiteManagementBundle\Entity\CampaignLocation;
use Cup\SiteManagementBundle\Form\LocationCollectionType;
use Cup\SiteManagementBundle\Entity\PromotionPartner;
use Cup\SiteManagementBundle\Form\PartnerCollectionType;
use Cup\SiteManagementBundle\Entity\DeliveryDetail;
use Cup\SiteManagementBundle\Entity\DeliveryDay;
use Cup\SiteManagementBundle\Form\DeliveryDetailType;
use Cup\SiteManagementBundle\Entity\DeliveryCustomerDetails;
use Cup\SiteManagementBundle\Form\DeliveryCustomerDetailsType;
use Cup\SiteManagementBundle\Entity\AgeGroup;
use Cup\SiteManagementBundle\Entity\IncomeGroup;
use Cup\SiteManagementBundle\Dto\DeliveryDetails;
use Cup\SiteManagementBundle\Form\DeliveryDetailCollectionType;
use Cup\SiteManagementBundle\Entity\Invoice;
use Cup\SiteManagementBundle\Entity\InvoiceItem;
use Cup\SiteManagementBundle\Entity\InvoiceTerm;
use Cup\SiteManagementBundle\Form\InvoiceType;
use Cup\SiteManagementBundle\Entity\GingerCupUser;
use Cup\SiteManagementBundle\Form\GingerCupUserType;
use Cup\SiteManagementBundle\Form\UserSearchType;
use Cup\SiteManagementBundle\Entity\Location;
use Cup\SiteManagementBundle\Entity\Consumer;
use Cup\SiteManagementBundle\Form\ConsumerType;
use Cup\SiteManagementBundle\Entity\EstabType;
use Cup\SiteManagementBundle\Form\EstabTypeType;
use Cup\SiteManagementBundle\Form\LocationType;
use Cup\SiteManagementBundle\Form\LocationSearchType;
use Cup\SiteManagementBundle\Form\ConsumerSearchType;
use Cup\SiteManagementBundle\Entity\City;
use Cup\SiteManagementBundle\Entity\PreviewImage;
use Cup\SiteManagementBundle\Form\CityType;
use Cup\SiteManagementBundle\Dto\UploadExcel;
use Cup\SiteManagementBundle\Form\UploadExcelType;
use Cup\SiteManagementBundle\Form\UploadLocationExcelType;
use Cup\SiteManagementBundle\Service\ToWords;
use Cup\SiteManagementBundle\Service\WebScrapper;
use Doctrine\Common\Collections\ArrayCollection;
use Cup\SiteManagementBundle\Entity\ActivityType;
use Cup\SiteManagementBundle\Form\ActivityTypeType;

/**
 * DeliveryPartner controller.
 *
 */
class DeliveryPartnerController extends Controller
{
    /**
     * Lists all DeliveryPartner entities.
     *
     */
    public function indexAction()
    {
    	

        $security = $this->container->get ( 'security.authorization_checker' );
        if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {

			return $this->redirect ( $this->generateUrl ('cup_security_homepage') );

		}
        $em = $this->getDoctrine()->getManager();

        $deliveryPartners = $em->getRepository('CupSiteManagementBundle:DeliveryPartner')->findAll();

        return $this->render('CupSiteManagementBundle:Default:partnerList.html.twig', array(
            'deliveryPartners' => $deliveryPartners,
        ));
    }
    
     /**
     * Lists all DeliveryPartner entities.
     *
     */
    public function homeAction()
    {
    	$postslist = array();
    	 /* require('../../blog/wp-blog-header.php');
    	$args = array( 'numberposts' => 3, 'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date");
    	$postslist = get_posts( $args ); */
    	//echo var_dump($postslist[0]->guid);
		//exit();
    	
    	    	
    	//echo var_dump($gallery);
    	//exit();
      
       // return $this->render('CupSiteManagementBundle:Default:home.html.twig');
       
    	$clientList = $this->getDoctrine()
    	->getRepository('CupSiteManagementBundle:OurClient')
    	->findAll();
    	
        return $this->render('CupSiteManagementBundle:Default:home.html.twig', array(
        	'postslist'=>$postslist,
        	'clientList'=>$clientList,
        		
        ));
        
        
    }
    /**
     *
     */
    public function webscrapperAction()
    {
        // $scraper = new WebScrapper();
        //$html = $scraper->file_get_html('https://www.collegedekho.com/filter/colleges-in-india/');
       // $html = $scraper->file_get_html('http://www.collegedekho.com/scripts/get-institutes/');
        // $html = $scraper->file_get_html('http://www.shiksha.com/mba/colleges/mba-colleges-in-india?hl=1');
 //echo var_dump($html);
//   exit();
        // Find all images 
        $colleges = array();
       /* foreach($html->find('.box-right') as $element){
             $college = array();
            $college_name = $element->find('a.college_name');
            //echo var_dump($college_name);
            $college_location = $element->find('span.college_location');
            $rating_val = $element->find('span.rating_val');
               // if(is_object($college_name)){
                $college['name'] = $college_name[0]->innertext();
            $college['location'] = $college_location[0]->innertext();
                $college['rating'] = $rating_val[0]->innertext();
                /*foreach($element->getElementByTagName('p') as $element)
                   echo var_dump($element->getElementByTagName('p'));*/
               // }
           // $colleges[] = $college;
            
       // }
        
        /* foreach($html->find('.listing-colleges') as $element){
             $college = array();
             $college['location'] = '';
            $college_name = $element->find('div.name-college a');
            //echo var_dump($college_name);
            $college_location = $element->find('div.courses-name');
            //$rating_val = $element->find('span.rating_val');
               // if(is_object($college_name)){
                $college['name'] = $college_name[0]->innertext();
             if(count($college_location)>0)
            $college['location'] = $college_location[0]->innertext();
             //   $college['rating'] = $rating_val[0]->innertext();
                
               // }
           // $colleges[] = $college;
            
        }*/
       // $colleges = $this->crawl($html,$colleges,$scraper);
        
         
        // Find all links 
       // foreach($html->find('a') as $element) 
              // echo $element->href . '<br>';
              //  exit();
       // header ( 'Content-Type: application/force-download' );
		//header ( 'Content-disposition: attachment; filename=clg.xls' );
        return $this->render('CupSiteManagementBundle:Default:scarp-list.html.twig', array(
            'colleges' => $colleges,
        ));
    }
    
     /**
     *
     */
    public function beBangaloreScrapperAction($city)
    {
        $url = 'http://engineering.shiksha.com/be-btech-courses-in-'.$city.'-ctpg';
       return $this->getPage($url);  
    }
    /**
     *
     */
    public function mbaScrapperAction($city)
    {
        $url = 'http://www.shiksha.com/mba/colleges/mba-colleges-in-'.$city;
        $url = 'http://listing.indiacollegedirectory.com/directory/index.jsp';
       return $this->getPage($url);  
    }
     
    public function getPage($url){
         $colleges = array();
    $scraper = new WebScrapper();
        $html = $scraper->file_get_html($url);
        echo var_dump($html);
        exit();
         $colleges = $this->crawl($html,$colleges,$scraper);
       // header ( 'Content-Type: application/force-download' );
	//	header ( 'Content-disposition: attachment; filename=clg.xls' );
        return $this->render('CupSiteManagementBundle:Default:scarp.html.twig', array(
            'colleges' => $colleges,
        ));
    }
    public function crawl($html,$colleges,$scraper){
        
        foreach($html->find('.category-tupple') as $element){
             $college = array();
             $college['name'] = '';
              $college['location'] = '';
              $college['rating'] = '';
            $college_name = $element->find('p.institute-title a');
            //echo var_dump($college_name);
            $college_location = $element->find('p.institute-title span');
            $rating_val = $element->find('div.ranking-bg');
               // if(is_object($college_name)){
             if(count($college_name)>0)
                $college['name'] = $college_name[0]->innertext();
             if(count($college_location)>0)
            $college['location'] = $college_location[0]->innertext();
        if(count($rating_val)>0)
                $college['rating'] = $rating_val[0]->innertext();
                /*foreach($element->getElementByTagName('p') as $element)
                   echo var_dump($element->getElementByTagName('p'));*/
               // }
            $colleges[] = $college;
            
        }
        $next = $html->find('a.next');
        if(count($next)>0){
            $url = $next[0]->href;
             $html = $scraper->file_get_html($url);
             $colleges = $this->crawl($html,$colleges,$scraper);
        }
        
        return $colleges;

    }
    
     /**
     *
     */
    public function newsAction()
    {
    	$mediaList = $this->getDoctrine()
    	->getRepository('CupSiteManagementBundle:OurMedia')
    	->findAll();
    	
    	return $this->render('CupSiteManagementBundle:Default:news.html.twig', array(
    			'mediaList'=>$mediaList
    	));
//         return $this->render('CupSiteManagementBundle:Default:news.html.twig');
    }
    /**
     *
     */
    public function blogAction()
    {
        return $this->render('CupSiteManagementBundle:Default:blog.html.twig');
    }
    /**
     *
     */
    public function mediaAction()
    {
        return $this->render('CupSiteManagementBundle:Default:media.html.twig');
    }
    /**
     *
     */
    public function storyAction()
    {
    	$client = $this->getDoctrine()
    	->getRepository('CupSiteManagementBundle:OurClient')
    	->findAll();
    	
        return $this->render('CupSiteManagementBundle:Default:stories.html.twig',array(
				'clients' => $client 				
		));
    }
    /**
     *
     */
    public function coffeeAdvertisingAction()
    {
        return $this->render('CupSiteManagementBundle:Default:coffeeAdvertising.html.twig');
    }
    /**
     *
     */
    public function paperAdvertisingAction()
    {
        return $this->render('CupSiteManagementBundle:Default:paperAdvertising.html.twig');
    }
    /**
     *
     */
    public function privacyPolicyAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:policy.html.twig');
    }
    /**
     *
     */
    public function termsAndConditionsAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:terms.html.twig');
    }
    /**
     *
     */
    public function galleryAction()
    {
    	$gallery = $this->getDoctrine()
    	->getRepository('CupSiteManagementBundle:GalleryCollection')
    	->findAll();
    	//echo var_dump($gallery);
    	//exit();
    	return $this->render('CupSiteManagementBundle:Default:gallery.html.twig',array(
				'galleries' => $gallery
				
				
		));
    }
    /**
     *
     */
    public function bahubaliGalleryAction()
    {	
    	
    	return $this->render('CupSiteManagementBundle:Default:bahubali-gallery.html.twig');
    }
    /**
     *
     */
    public function brigadeGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:brigade-gallery.html.twig');
    }
    /**
     *
     */
    public function hotstarGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:hotstar-gallery.html.twig');
    }
    /**
     *
     */
    public function pokerninjaCollegeGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:pokerninja-college-gallery.html.twig');
    }
    /**
     *
     */
    public function uberGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:uber-gallery.html.twig');
    }
    
    
    
    /**
     *
     */
    public function bookmyshowGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:bookmyshow-gallery.html.twig');
    }
    
    
    /**
     *
     */
    public function checkLittleGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:checkLittle-gallery.html.twig');
    }
    
    /**
     *
     */
    public function cloviaGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:clovia-gallery.html.twig');
    }
    
    /**
     *
     */
    public function colorsGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:colors-gallery.html.twig');
    }
    /**
     *
     */
    public function flashdoorGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:flashdoor-gallery.html.twig');
    }
    /**
     *
     */
    public function fxkartGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:fxkart-gallery.html.twig');
    }
    /**
     *
     */
    public function huaweiGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:huawei-gallery.html.twig');
    }
    /**
     *
     */
    public function modastaGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:modasta-gallery.html.twig');
    }
    /**
     *
     */
    public function myraGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:myra-gallery.html.twig');
    }
    /**
     *
     */
    public function nestawayGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:nestaway-gallery.html.twig');
    }
    /**
     *
     */
    public function pioneerGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:pioneer-gallery.html.twig');
    }
    /**
     *
     */
    public function pizzahutGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:pizzahut-gallery.html.twig');
    }
    /**
     *
     */
    public function pulseGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:pulse-gallery.html.twig');
    }
    /**
     *
     */
    public function scripboxGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:scripbox-gallery.html.twig');
    }
    /**
     *
     */
    public function superprofsGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:superprofs-gallery.html.twig');
    }
    /**
     *
     */
    public function wooplrGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:wooplr-gallery.html.twig');
    }
    /**
     *
     */
    public function yumistGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:yumist-gallery.html.twig');
    }
    
    
    /**
     *
     */
    public function otherGalleryAction()
    {
    	return $this->render('CupSiteManagementBundle:Default:other-gallery.html.twig');
    }
     /**
     *
     */
    public function contactSuccessAction()
    {
        return $this->render('CupSiteManagementBundle:Default:success.html.twig');
    }



    /**
     * Creates a new DeliveryPartner entity.
     *
     */
    public function newAction(Request $request)
    {
        $deliveryPartner = new DeliveryPartner();
        $form = $this->createForm(new DeliveryPartnerType(), $deliveryPartner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            /*$em->persist($deliveryPartner);
            $em->flush();*/
             $session = $request->getSession();
             $session->set('deliveryPartner',$deliveryPartner);


            return new Response('true');
           // return $this->redirectToRoute('delivery_detail_new');
        }

        return $this->render('CupSiteManagementBundle:Default:index.html.twig', array(
            'deliveryPartner' => $deliveryPartner,
            'form' => $form->createView(),
        ));
    }
    /**
     * slect plany multy city or single
     *
     */
    public function planTypeAction(Request $request)
    {
        $campaignRequest = new CampaignRequest();
        $form = $this->createForm(new CampaignPlanType(), $campaignRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            /*$em->persist($deliveryPartner);
            $em->flush();*/
             $session = $request->getSession();
             $session->set('campaignRequest',$campaignRequest);


            return new Response('true');
           // return $this->redirectToRoute('delivery_detail_new');
        }

        return $this->render('CupSiteManagementBundle:Default:planType.html.twig', array(
            'campaignRequest' => $campaignRequest,
            'form' => $form->createView(),
        ));
    }
    
     /**
     * Creates a new DeliveryPartner entity.
     *
     */
    public function selectCityAction(Request $request)
    {
         $session = $request->getSession();
        $campaignRequest = $session->get('campaignRequest');
        //$cities = $deliveryPartner->getCity();
        $selectCity = new SelectCity();
       
        $cityCollection = $selectCity->getCities();
         $campaignCity = new CampaignCity();
        $cityCollection->add($campaignCity);
        if($campaignRequest->getPlanType()=='Multiple City'){  
        $campaignCity = new CampaignCity();
        $cityCollection->add($campaignCity);
         $campaignCity = new CampaignCity();
        $cityCollection->add($campaignCity);
        }
        
        $cupService = $this->container->get( 'cup.services' );
       // $form = $this->createForm('Cup\SiteManagementBundle\Form\DeliveryDetailType', $deliveryDetail);
        $form = $this->createForm(new CityCollectionType($cupService), $selectCity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $budget = $this->getTotalBudget($selectCity);
            
            //$CampaignDate = $campaignRequest->getCampaignDate();
           // echo var_dump($CampaignDate);
            //exit();
            
            $campaignRequest->setTotalAmount($budget);
             $session->set('selectCity',$selectCity);
            return new Response('true');
        }
        return $this->render('CupSiteManagementBundle:Default:selectCity.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
	 * 
	 */
	private function getCitiesAsArray($cities)
	{
        $cupService = $this->container->get( 'cup.services' );
		$locations = $cupService->getLocation();
		$c = "(";
		foreach ($cities as $city){
                 $city = $city->getCity();
		          $c .= $city.",";
		}
        $c = rtrim($c, ",");
        $c .= ")";
		return $c;
	}
     /**
     * Creates a new DeliveryPartner entity.
     *
     */
    public function selectLocationAction(Request $request)
    {
         $session = $request->getSession();
        $campaignRequest = $session->get('campaignRequest');
          $selectCity = $session->get('selectCity');
        $promotionType = $campaignRequest->getPromotionType();
        $cities = $selectCity->getCities();
        $selectedCity = $this->getCitiesAsArray($cities);
        $cityArray = $this->getCities();
        if($promotionType=='Cup Campaign'){
            $selectLocation = new SelectLocation();
            $locationCollection = $selectLocation->getLocations();
            foreach ($cities as $city){
                $campaignLocation = new CampaignLocation();
                $campaignLocation->setCity($city->getCity());
                $locationCollection->add($campaignLocation); 
            }
        }else{
            $selectPartner = new SelectPartner();
            $partnerCollection = $selectPartner->getPartners();
            foreach ($cities as $city){
                $promotionPartner = new PromotionPartner();
                $promotionPartner->setCity($city->getCity());
                $partnerCollection->add($promotionPartner); 
            }
        }
        
        
                  
        /*$campaignLocation = new CampaignLocation();
        $locationCollection->add($campaignLocation);
         $campaignLocation = new CampaignLocation();
        $locationCollection->add($campaignLocation);*/
        
         $cupService = $this->container->get( 'cup.services' );
       // $form = $this->createForm('Cup\SiteManagementBundle\Form\DeliveryDetailType', $deliveryDetail);
        if($promotionType=='Cup Campaign')
            $form = $this->createForm(new LocationCollectionType($cupService,$selectedCity), $selectLocation);
        else
            $form = $this->createForm(new PartnerCollectionType($cupService,$selectedCity), $selectPartner);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $totalReach = 0;
            if($promotionType=='Cup Campaign'){
                $reachByLocation = $cupService->getReachByLocation();        
                $reachByLocation = $this->getReachByLocation($reachByLocation);
                $locations = $selectLocation->getLocations();
                $session->set('selectLocation',$selectLocation);
                foreach ($locations as $location){
                    $ids = $location->getLocation();
                    $cityId = $location->getCity();
                    $city = $this->getCity($cityId,$selectCity);
                    $cityReach = 0;
                    $quantity = 0;
                    $locationCollection = new ArrayCollection();
                        foreach ($ids as $id){
                            $locationObj = new CampaignLocation();
                           // $reach = (int) $reachByLocation[$id];
                            $k = $reachByLocation[$id];
                            $c = $k[0];
                            $reach = $k[1];                          
                             $locationObj->setNoOfReach($reach);
                             $locationObj->setCity($cityId);
                             $locationObj->setLocation($id);
                            $locationCollection->add($locationObj);
                            $locationObj->setCampaignCity($city);
                            $totalReach += $reach;
                            $cityReach += $reach;
                             $quantity += (int) $c;
                        }
                    $budget = $city->getBudget();
                    $cost = round($budget/$cityReach,2);
                    $city->setLocation($locationCollection);
                    $city->setReach($cityReach);
                    $city->setCupQuantityPerDay($budget);
                    $city->setCostForReach($cost);
                    $city->setCampaign($campaignRequest);
                    if($cityReach>0)
                    $city = $this->getEndDate($city);
                        
                }
            }
            else{
                $reachByPartner = $cupService->getAllPartner();        
                $reachByPartner = $this->getReachByPartner($reachByPartner);
                $partners = $selectPartner->getPartners();
                $session->set('selectPartner',$selectPartner);
                foreach ($partners as $partner){
                $ids = $partner->getPartner();
                $cityId = $partner->getCity();
                $city = $this->getCity($cityId,$selectCity);
                $cityReach = 0;
                $partnerCollection = new ArrayCollection();
                    foreach ($ids as $id){
                        $partnerObj = new PromotionPartner();
                        $reach = (int) $reachByPartner[$id];
                         $partnerObj->setNoOfReach($reach);
                         $partnerObj->setCity($cityId);
                         $partnerObj->setPartner($id);
                        $partnerCollection->add($partnerObj);
                        $partnerObj->setCampaignCity($city);
                        $totalReach += $reach;
                        $cityReach += $reach;
                    }
                $city->setPartner($partnerCollection);
                $city->setReach($cityReach);
                $city->setCampaign($campaignRequest);
                
                if($cityReach>0)
                $city = $this->getEndDate($city);
                
                }
            
            }
            
            
             $campaignRequest->setTotalReach($totalReach);
            return new Response('true');
        }
        if($promotionType=='Cup Campaign')
            return $this->render('CupSiteManagementBundle:Default:selectLocation.html.twig', array(
                'form' => $form->createView(),
                'cities'=>$cities,
                 'request' => $campaignRequest,
                'cityArray'=>$cityArray,
            ));
        else
            return $this->render('CupSiteManagementBundle:Default:selectPartner.html.twig', array(
                'form' => $form->createView(),
                'cities'=>$cities,
                 'request' => $campaignRequest,
                'cityArray'=>$cityArray,
            ));
    }
     /**
     * Creates a new DeliveryPartner entity.
     *
     */
    public function totalReachAction(Request $request)
    {
        $locations = $request->get('locations');
        $budget = $request->get('budget');
        /*$locations = array();
        $locations[0]=2;
        $locations[1]=5;
        $budget = 456233;*/
       // $locations = $locations['locations'];
        $cupService = $this->container->get( 'cup.services' );
         $reachByLocation = $cupService->getReachByLocation();
         $reachByLocation = $this->getReachByLocation($reachByLocation);
        $reach = 0;
        $quantity = 0;
        if(is_array($locations)){
            foreach ($locations as $location){
               // $id = $location['location'];
                $k = $reachByLocation[$location];
                $c = $k[0];
                $r = $k[1];
                $reach += (int) $r;
                $quantity += (int) $c;
            }
        }
        /*$session = $request->getSession();
        $campaignRequest = $session->get('campaignRequest');
         $campaignRequest->setTotalReach($reach);*/
        $cost = round($budget/$reach,2);
        $str = $reach.','.$quantity.','.$cost;
        
        return new Response($str);
    }
    
    private function getReachByLocation($reachByLocation){
        $tempReach = array();
		foreach ($reachByLocation as $location){
             if(!is_null($location['location'])){
		          $tempReach[$location['location']] = array($location['quantity'],$location['reach']);
             }
		}
		return $tempReach;
    }
     private function getTotalBudget($selectCity){
        $cityCollection = $selectCity->getCities();
        $budget = 0;
		foreach ($cityCollection as $city){
             if(!is_null($city->getBudget())){
		         $budget += $city->getBudget();
             }
		}
		return $budget;
    }
    private function getCity($cityId,$selectCity){
        $cityCollection = $selectCity->getCities();
        $city = 0;
		foreach ($cityCollection as $city){
             if($city->getCity()==$cityId){
		         return $city;
             }
		}
		return $city;
    }
    private function getEndDate($city){
         $budget = $city->getBudget();
        $reach = $city->getReach();
        $days = round($budget/$reach);
        $city->setNoOfDays($days);
        $endDate = clone $city->getCampaignDate();
      //  $endDate = new \DateTime($selectedDate);
        $endDate->modify('+'.$days.' day');
        $city->setCampaignEndDate($endDate);
		return $city;
    }
     /**
     * slect plany multy city or single
     *
     */
    public function selectDateAction(Request $request)
    {
        $session = $request->getSession();
        $campaignRequest = $session->get('campaignRequest');
        $form = $this->createForm(new CampaignDateType(), $campaignRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            /*$em->persist($deliveryPartner);
            $em->flush();*/
            // $session = $request->getSession();
             //$session->set('campaignRequest',$campaignRequest);


            return new Response('true');
           // return $this->redirectToRoute('delivery_detail_new');
        }

        return $this->render('CupSiteManagementBundle:Default:campaignDate.html.twig', array(
            'campaignRequest' => $campaignRequest,
            'form' => $form->createView(),
        ));
    }
     /**
     * slect plany multy city or single
     *
     */
    public function changeDateAction(Request $request)
    {
        $session = $request->getSession();
        $campaignRequest = $session->get('campaignRequest');
        $budget =(int) $campaignRequest->getTotalAmount();
         $reach =(int) $campaignRequest->getTotalReach();
        $days = round($budget/$reach);
        $selectedDate = $request->get('selectedDate');
        $selectedDate = new \DateTime($selectedDate);
        $selectedDate->modify('+'.$days.' day');
        $endDate = $selectedDate->format('m/d/Y');
        return new Response($endDate);
        
    }
     /**
     * upload Design
     *
     */
    public function uploadDesignAction(Request $request)
    {
        $session = $request->getSession();
        $campaignRequest = new CampaignRequest();
       // $campaignRequest->setDesign(null);
        $form = $this->createForm(new UploadDesignType(), $campaignRequest, array(
				'action' => $this->generateUrl('cup_site_management_campaign_upload_design'),
				'method' => 'POST',
		));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            /*$em->persist($deliveryPartner);
            $em->flush();*/
            // $session = $request->getSession();
             //$session->set('campaignRequest',$campaignRequest);
            
            $Doccuments = $campaignRequest->getDesign();
            $file_name = '';
			foreach($Doccuments as $uploadedfile){ 
				if ($uploadedfile) {
					$file_name = $uploadedfile->getClientOriginalName ();				
					$dir = 'designs/';
					$uploadedfile->move ( $dir, $file_name );
				}
			}

       
        $campaignRequest = $session->get('campaignRequest');
        $campaignRequest->setDesign($file_name);
            return new Response($file_name);
           // return $this->redirectToRoute('delivery_detail_new');
        }
         $campaignRequest = $session->get('campaignRequest');

        return $this->render('CupSiteManagementBundle:Default:uploadDesign.html.twig', array(
            'campaignRequest' => $campaignRequest,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * upload Design
     *
     */
    public function uploadPreviewDesignAction(Request $request)
    {
    	$security = $this->container->get ( 'security.context' );
    	if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
    		if (! $security->isGranted ( 'ROLE_ADMIN' ))
    			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
    	}
    	$session = $request->getSession();
    	$campaignRequest = new CampaignRequest();
    	// $campaignRequest->setDesign(null);
    	$form = $this->createForm(new UploadDesignType(), $campaignRequest, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_upload_preview_design'),
    			'method' => 'POST',
    	));
    	$form->handleRequest($request);
    
    	if ($form->isSubmitted() && $form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		/*$em->persist($deliveryPartner);
    		 $em->flush();*/
    		// $session = $request->getSession();
    		//$session->set('campaignRequest',$campaignRequest);
    
    		$Doccuments = $campaignRequest->getDesign();
    		$file_name = '';
    		foreach($Doccuments as $uploadedfile){
    			if ($uploadedfile) {
    				$file_name = $uploadedfile->getClientOriginalName ();
    				$dir = '../../uploads/';
    				$uploadedfile->move ( $dir, $file_name );
    			}
    		}
    		
    		$user = $security->getToken ()->getUser ();
    		$email = '';
    		if(is_object($user)){
    			$email = $user->getEmail ();
    		}
    		$addedBy = 'Guest';
    		$users = $em->getRepository('CupSiteManagementBundle:GingerCupUser')->findBy(array('userEmail'=>$email));
    		if($users){
    			$user = $users[0];
    			$addedBy = $user->getId();
    		}
    		$filePath = '../uploads/'.$file_name;
    		$previewImage = new PreviewImage();
    		$previewImage->setImageUrl($filePath);
    		$previewImage->setUserId($addedBy);
    		$previewImage->setActive(1);
    		$em->persist($previewImage);
    		$em->flush();
    		
    		return new Response($file_name);
    		// return $this->redirectToRoute('delivery_detail_new');
    	}
    	//$campaignRequest = $session->get('campaignRequest');
    
    	return $this->render('CupSiteManagementBundle:Default:upload3DDesign.html.twig', array(
    			'campaignRequest' => $campaignRequest,
    			'form' => $form->createView(),
    	));
    }
     /**
     * upload Design
     *
     */
    public function submitDetailAction(Request $request)
    {
        $session = $request->getSession();
        $campaignRequest = $session->get('campaignRequest');
        $form = $this->createForm(new CampaignRequestType(), $campaignRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            /*$em->persist($deliveryPartner);
            $em->flush();*/
            // $session = $request->getSession();
             //$session->set('campaignRequest',$campaignRequest);


            return new Response('true');
           // return $this->redirectToRoute('delivery_detail_new');
        }

        return $this->render('CupSiteManagementBundle:Default:customer.html.twig', array(
            'campaignRequest' => $campaignRequest,
            'form' => $form->createView(),
        ));
    }
     /**
     * Finds and displays a DeliveryPartner entity.
     *
     */
    public function requestCampaignAction(Request $request)
    {

        return $this->render('CupSiteManagementBundle:Default:requestCampaign.html.twig', array(
            //'deliveryPartner' => $deliveryPartner,
        ));
    }
   
     /**
     * Finds and displays a DeliveryPartner entity.
     *
     */
    public function confirmCampaignAction(Request $request)
    {
         $session = $request->getSession();
        $campaignRequest = $session->get('campaignRequest');
        $selectLocation = $session->get('selectLocation');
         $selectCity = $session->get('selectCity');
         $locations = $this->getLocations();      
         $cityArray = $this->getCities();
       

        return $this->render('CupSiteManagementBundle:Default:confirmCampaign.html.twig', array(
            'request' => $campaignRequest,
            'selectLocation'=>$selectLocation,
            'locations'=>$locations,
            'selectCity'=>$selectCity,
            'cityArray'=>$cityArray
        ));
    }
    
    
     /**
     * Finds and displays a DeliveryPartner entity.
     *
     */
    public function requestPromotionAction(Request $request)
    {

        return $this->render('CupSiteManagementBundle:Default:requestPromotion.html.twig', array(
            //'deliveryPartner' => $deliveryPartner,
        ));
    }
    
    /**
     * Creates a new DeliveryPartner entity.
     *
     */
    public function selectPartnerAction(Request $request)
    {
         $session = $request->getSession();
        $campaignRequest = $session->get('campaignRequest');
          $selectCity = $session->get('selectCity');
        $cities = $selectCity->getCities();
        $selectedCity = $this->getCitiesAsArray($cities);
        $selectLocation = new SelectLocation();
       $locationCollection = $selectLocation->getLocations();
        foreach ($cities as $city){
            $campaignLocation = new CampaignLocation();
            $campaignLocation->setCity($city->getCity());
            $locationCollection->add($campaignLocation); 
        }
        $cityArray = $this->getCities();
        
                  
        /*$campaignLocation = new CampaignLocation();
        $locationCollection->add($campaignLocation);
         $campaignLocation = new CampaignLocation();
        $locationCollection->add($campaignLocation);*/
        
         $cupService = $this->container->get( 'cup.services' );
       // $form = $this->createForm('Cup\SiteManagementBundle\Form\DeliveryDetailType', $deliveryDetail);
        $form = $this->createForm(new PartnerCollectionType($cupService,$selectedCity), $selectLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reachByLocation = $cupService->getReachByLocation();        
            $reachByLocation = $this->getReachByLocation($reachByLocation);
            $locations = $selectLocation->getLocations();
             $session->set('selectLocation',$selectLocation);
            $totalReach = 0;
            foreach ($locations as $location){
                $ids = $location->getLocation();
                $cityId = $location->getCity();
                $city = $this->getCity($cityId,$selectCity);
                $cityReach = 0;
                $locationCollection = new ArrayCollection();
                foreach ($ids as $id){
                    $locationObj = new CampaignLocation();
                    $reach = (int) $reachByLocation[$id];
                     $locationObj->setNoOfReach($reach);
                     $locationObj->setCity($cityId);
                     $locationObj->setLocation($id);
                    $locationCollection->add($locationObj);
                    $locationObj->setCampaignCity($city);
                    $totalReach += $reach;
                    $cityReach += $reach;
                }
                $city->setLocation($locationCollection);
                $city->setReach($cityReach);
                $city->setCampaign($campaignRequest);
                if($cityReach>0)
                $city = $this->getEndDate($city);
                
            }
             $campaignRequest->setTotalReach($totalReach);
            return new Response('true');
        }
        return $this->render('CupSiteManagementBundle:Default:selectLocation.html.twig', array(
            'form' => $form->createView(),
            'cities'=>$cities,
             'request' => $campaignRequest,
            'cityArray'=>$cityArray,
        ));
    }
    
     /**
     * Creates a new DeliveryPartner entity.
     *
     */
    public function totalFlyerReachAction(Request $request)
    {
        $partners = $request->get('partners');
        $city = $request->get('city');
       // $locations = $locations['locations'];
        $cupService = $this->container->get( 'cup.services' );
         $reachByPartner = $cupService->getPartnerByCity($city);
        
         $reachByPartner = $this->getReachByPartner($reachByPartner);
       // echo var_dump($reachByLocation);
        $reach = 0;
       // echo var_dump($city);
       // exit();
        if(is_array($partners)){
            foreach ($partners as $partner){
               // $id = $location['location'];
                $reach += (int) $reachByPartner[$partner];
            }
        }
        /*$session = $request->getSession();
        $campaignRequest = $session->get('campaignRequest');
         $campaignRequest->setTotalReach($reach);*/
        ///echo var_dump($reach);
        return new Response($reach);
    }
    
    private function getReachByPartner($reachByPartner){
        $tempReach = array();
		foreach ($reachByPartner as $partner){
            // if(!is_null($partner)){
		          $tempReach[$partner->getId()] = $partner->getNoOfOrders();
            // }
		}
		return $tempReach;
    }
    private function getPartnerById($partners){
        $tempReach = array();
		foreach ($partners as $partner){
            // if(!is_null($partner)){
		          $tempReach[$partner->getId()] = $partner;
            // }
		}
		return $tempReach;
    }
    
    
    
    /**
	 * 
	 */
	private function getLocations()
	{
        $cupService = $this->container->get( 'cup.services' );
		$locations = $cupService->getLocation();
		$tempLocations = array();
		foreach ($locations as $location){
            // if($location->getActive()){
                 $city = $location->getCity();
		          $tempLocations[$location->getId()] = $location->getName().'-'.$city->getName();
            // }
		}
		return $tempLocations;
	}
     /**
	 * 
	 */
	private function getCities()
	{
        $cupService = $this->container->get( 'cup.services' );
		$cities = $cupService->getCity();
		$tempCities = array();
		foreach ($cities as $city){
            // if($location->getActive()){
		          $tempCities[$city->getId()] = $city->getName();
            // }
		}
		return $tempCities;
	}
     /**
     * Finds and displays a DeliveryPartner entity.
     *
     */
    public function finishCampaignAction(Request $request)
    {

         $session = $request->getSession();
        $campaignRequest = $session->get('campaignRequest');
        $selectLocation = $session->get('selectLocation');
         $selectCity = $session->get('selectCity');
        // $locations = $this->getLocations();      
        // $cityArray = $this->getCities();
        $cities = $selectCity->getCities();
        $campaignRequest->setCity($cities);
         $em = $this->getDoctrine()->getManager();
        $em->persist($campaignRequest);
        $em->flush();
        /*foreach ($cities as $city){
         echo var_dump($city->getCampaign());
        exit();
        }*/
        return $this->render('CupSiteManagementBundle:Default:success.html.twig', array(
            //'deliveryPartner' => $deliveryPartner,
        ));
    }
    /**
	 * contact list
	 * @return unknown
	 */
	public function campaignListAction() {
		$em = $this->getDoctrine ()->getManager ();	
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		$requests = $em->getRepository ( 'CupSiteManagementBundle:CampaignRequest' )->findBy(array(), array('id' => 'DESC'));
	   return $this->render('CupSiteManagementBundle:Default:campaignList.html.twig',array(
    			'requests' => $requests,
    	));
		
	}
    /**
	 * contact list
	 * @return unknown
	 */
	public function viewCampaignAction(Request $request,$id) {
		$em = $this->getDoctrine ()->getManager ();	
         $cupService = $this->container->get( 'cup.services' );
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		$request = $em->getRepository ( 'CupSiteManagementBundle:CampaignRequest' )->find($id);
        $locations = $this->getLocations();      
        $cities = $this->getCities();
        $partners = $cupService->getAllPartner();        
        $partners = $this->getPartnerById($partners);
	   return $this->render('CupSiteManagementBundle:Default:viewCampaign.html.twig',array(
    			'request' => $request,
                'cities'=>$cities,
                'locations'=>$locations,
                'partners'=>$partners,
           
    	));
		
	}
     /**
     * Finds and displays a design in 3D view.
     *
     */
    public function previewDesignOldAction(Request $request,$id)
    {
        $em = $this->getDoctrine ()->getManager ();	
        $preview = $em->getRepository ( 'CupSiteManagementBundle:PreviewImage' )->find($id);
        return $this->render('CupSiteManagementBundle:Default:3DView.html.twig', array(
            'preview' => $preview,
        ));
    }
    /**
     * Finds and displays a design in 3D view.
     *
     */
    public function previewDesignAction(Request $request,$id)
    {
        $em = $this->getDoctrine ()->getManager ();	
		$imageUrl = '../uploads/'.$id;
        $preview = $em->getRepository ( 'CupSiteManagementBundle:PreviewImage' )->findBy(array('imageUrl'=>$imageUrl,'active'=>1));
        if(count($preview)>0){
        return $this->render('CupSiteManagementBundle:Default:3DView.html.twig', array(
            'preview' => $preview[0],
        ));
        }else{
            return $this->render('CupSiteManagementBundle:Default:expired.html.twig');
        }
    }
    /**
	 * contact list
	 * @return unknown
	 */
	public function previewListAction() {
		$em = $this->getDoctrine ()->getManager ();	
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		$previews = $em->getRepository ( 'CupSiteManagementBundle:PreviewImage' )->findBy(array('active'=>1), array('id' => 'DESC'));
	   return $this->render('CupSiteManagementBundle:Default:previewList.html.twig',array(
    			'previews' => $previews,
    	));
		
	}
     /**
     * Finds and displays a design in 3D view.
     *
     */
    public function deactivateDesignAction(Request $request,$id)
    {
        $em = $this->getDoctrine ()->getManager ();	
        $preview = $em->getRepository ( 'CupSiteManagementBundle:PreviewImage' )->find($id);        
        $preview->setActive(0);
        $em->persist($preview);
        $em->flush();
        return new Response('true');
        
    }
    
    
     /**
     * Creates a new DeliveryPartner entity.
     *
     */
    public function deliveryDetailAction(Request $request)
    {
         $session = $request->getSession();
        $deliveryPartner = $session->get('deliveryPartner');
        $cities = $deliveryPartner->getCity();
        $deliveryDetailDto = new DeliveryDetails();
        $deliveryDetailCollection = $deliveryDetailDto->getDeliveryDetail();
         foreach($cities as $city){
             $deliveryDetail = new DeliveryDetail();
             $deliveryDetail->setCity($city);
             $deliveryDetailCollection->add($deliveryDetail);
         }
        
       // $form = $this->createForm('Cup\SiteManagementBundle\Form\DeliveryDetailType', $deliveryDetail);
        $form = $this->createForm(new DeliveryDetailCollectionType(), $deliveryDetailDto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $deliveryDetailCollection = $deliveryDetailDto->getDeliveryDetail();
            $detailCollection = $deliveryPartner->getDetail();
            $deliveryDayList = $deliveryPartner->getDay();
            $deliveryDayCollection = new ArrayCollection();
            foreach($deliveryDetailCollection as $deliveryDetail){
                $deliveryDetail->setPartner($deliveryPartner);
                $detailCollection->add($deliveryDetail);
            }
            foreach($deliveryDayList as $day){
                $deliveryDay = new DeliveryDay();
                $deliveryDay->setDay($day);
                $deliveryDay->setActive(1);
                $deliveryDay->setPartner($deliveryPartner);
                $deliveryDayCollection->add($deliveryDay);
            }
            $deliveryPartner->setDeliveryDay($deliveryDayCollection);
            /*$em->persist($deliveryPartner);
            $em->flush();*/
            
             return new Response('true');
            //return $this->redirectToRoute('delivery_customer_detail_new');
        }

        return $this->render('CupSiteManagementBundle:Default:deliveryDetails.html.twig', array(
            'deliveryDetail' => $deliveryDetail,
            'form' => $form->createView(),
        ));
    }
    
        /**
     * Creates a new DeliveryPartner entity.
     *
     */
    public function customerDetailAction(Request $request)
    {
        $customerDetails = new DeliveryCustomerDetails();
        $form = $this->createForm(new DeliveryCustomerDetailsType(), $customerDetails);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $session = $request->getSession();
             $deliveryPartner = $session->get('deliveryPartner');
            $customerCollection = $deliveryPartner->getCustomerDetail();
            $customerCollection->add($customerDetails);
            $customerDetails->setPartner($deliveryPartner);
           $ageList = $customerDetails->getAgeGroup();           
           $ageCollection = $deliveryPartner->getAgeGroup();
             foreach($ageList as $age){
                 $ageGroup = new AgeGroup();
                 $ageGroup->setAgeGroup($age);
                 $ageGroup->setPartner($deliveryPartner);
                 $ageCollection->add($ageGroup);
                 
             }
            $incomeList = $customerDetails->getIncomeGroup();           
           $incomeCollection = $deliveryPartner->getIncomeGroup();
             foreach($incomeList as $income){
                 $incomeGroup = new IncomeGroup();
                 $incomeGroup->setIncomeGroup($income);
                 $incomeGroup->setPartner($deliveryPartner);
                 $incomeCollection->add($incomeGroup);
             }
            $em = $this->getDoctrine()->getManager();
            $em->persist($deliveryPartner);
            $em->flush();


           return $this->render('CupSiteManagementBundle:Default:finish.html.twig');
        }

        return $this->render('CupSiteManagementBundle:Default:customerDetail.html.twig', array(
            'customerDetails' => $customerDetails,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DeliveryPartner entity.
     *
     */
    public function showAction(DeliveryPartner $deliveryPartner)
    {
       // $deleteForm = $this->createDeleteForm($deliveryPartner);
        $city = array(
                                        1=>'Bangalore',
                                        2=>'Mumbai',
                                        3=>'Delhi',
				            		);

        return $this->render('CupSiteManagementBundle:Default:partner.html.twig', array(
            'deliveryPartner' => $deliveryPartner,
            'city'=>$city,
        ));
    }
    
     /**
     * Finds and displays a DeliveryPartner entity.
     *
     */
    public function enrollDeliveryPartnerAction(Request $request)
    {

        return $this->render('CupSiteManagementBundle:Default:enrollDeliveryPartner.html.twig', array(
            //'deliveryPartner' => $deliveryPartner,
        ));
    }

    /**
     * Displays a form to edit an existing DeliveryPartner entity.
     *
     */
    public function editAction(Request $request, DeliveryPartner $deliveryPartner)
    {
        $deleteForm = $this->createDeleteForm($deliveryPartner);
        $editForm = $this->createForm('Cup\SiteManagementBundle\Form\DeliveryPartnerType', $deliveryPartner);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($deliveryPartner);
            $em->flush();

            return $this->redirectToRoute('deliverypartner_edit', array('id' => $deliveryPartner->getId()));
        }

        return $this->render('deliverypartner/edit.html.twig', array(
            'deliveryPartner' => $deliveryPartner,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a DeliveryPartner entity.
     *
     */
    public function deleteAction(Request $request, DeliveryPartner $deliveryPartner)
    {
        $form = $this->createDeleteForm($deliveryPartner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($deliveryPartner);
            $em->flush();
        }

        return $this->redirectToRoute('deliverypartner_index');
    }

    /**
     * Creates a form to delete a DeliveryPartner entity.
     *
     * @param DeliveryPartner $deliveryPartner The DeliveryPartner entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DeliveryPartner $deliveryPartner)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('deliverypartner_delete', array('id' => $deliveryPartner->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    /**
     *
     * @param Contact $entity
     * @return unknown
     */
    private function createContactForm(Contact $entity)
    {
    	$form = $this->createForm(new ContactType(), $entity, array(
    			'action' => $this->generateUrl('deliverypartner_reach_us'),
    			'method' => 'POST',
    	));
    	$form->add('submit', 'submit', array('label' => 'Submit Now'));
    	return $form;
    }
    
    
    /**
     *
     */
    public function contactAction(Request $request){
    	$entity = new Contact();
    	$session = $request->getSession();
    	
    	$entity->setAdvertiseType('Advertise with us');
    	date_default_timezone_set('Asia/Kolkata');
    	$date = new \DateTime();
    	$entity->setDate($date);
    	 $error=null;
    	
    	$imagesList = array("2.jpg"=>'2', "4.jpg"=>'4', "6.jpg"=>'6');
    	
            $captcha = array_rand($imagesList);
         //   echo var_dump($captchaIndex);
        	//exit();
           // $captcha =  $imagesList[$captchaIndex];
           // echo var_dump($captcha);
            //exit();
          
    	$form   = $this->createContactForm($entity);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$answer=$entity->getAnswer();
    	//echo var_dump($answer);
    	//exit();
    		
    		
    		$oldCaptcha = $session->get('captcha');
    		
    		//echo var_dump($oldCaptcha);
    		//exit();
    		$correctAnswer = $imagesList[$oldCaptcha];
    		
    		if($answer==$correctAnswer)
    		{
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($entity);
    		$em->flush();
    		$email = $entity->getEmail();
    	
    		$body="<br>";    		
    		$body.="<label>Name:</label>".$entity->getName()."<br>";
    		$body.="<label>Email:</label>".$entity->getEmail()."<br>";
    		$body.="<label>Contact Number:</label>".$entity->getMobile()."<br>";
    		$body.="<label>Message:</label>".$entity->getMessage()."<br>";
    		$Mailer='<table>
			<TR><TD>Dear Admin , bellow person has some query.Please do response to '.$entity->getName().' on the earliest. </TD></TR>
			<tr style="background-color:#f2f2f2" width="100%">
              <td valign="top" align="center" colspan="2">
                <p style="margin:0 0 8px 0;font-size:14px;line-height:22px;text-align:left">
            		<b style="padding:20px;">
                       '.$body.'          
            		</b></p>
                
				<tr><td>Thank you</td></tr>
				<tr><td>Best Regards, <br>
    
						Gingercup Team <br><br></td></tr>
              </td>
            </tr>
            
			  </table>';
    		
    		$message="Dear ".$entity->getName()."<br>
                            Greetings from Gingercup Team!<br>
                            Your request has been lodged successfully. We will contact you through call/mail within next 48 working hours.<br><br>
              
    		
                            Best Regards,<br>
                            Gingercup Team <br> ";
    		$subject = "Request";
    		$adminSubject = "Request from ".$entity->getName()." - ".$entity->getMobile();
             $mailService = $this->container->get( 'mail.services' );
    		$mailService->mail($email,$subject,$message);
    		$mailService->mail('contact@gingercup.com',$adminSubject,$Mailer);
            //$mailService->mail('kishan.kish530@gmail.com',$adminSubject,$Mailer);
    		
    		return $this->redirect($this->generateUrl('deliverypartner_contact_success'));
    	}
    	else {
    		$error='Please  Enter Valid Answer';
    		$session->set('captcha',$captcha);
    	}
    	
    	}
    	//echo var_dump($captcha);
    //	exit();
    	
    	$session->set('captcha',$captcha);
    	
    	return $this->render('CupSiteManagementBundle:Default:contact.html.twig',array(
    			'entity' => $entity,
    			'error'=> $error,
    			'form'   => $form->createView(),
    			'captcha'=>$captcha,
    	));
    }

    
    private function createContactSearchForm(ContactSearchDto $dto){
    	//$catalogueService = $this->container->get( 'catalogue.service' );
    	$form = $this->createForm(new ContactSearchType(), $dto, array(
    			'action' => $this->generateUrl('deliverypartner_contact_search'),
    			'method' => 'GET',
    	));
    	 
    	$form->add ( 'submit', 'submit', array (
    			'label' => 'Search'
    	) );
    
    	return $form;
    }
    
    
    /**
	 * contact list
	 * @return unknown
	 */
	public function contactListAction(Request $request) {
		$em = $this->getDoctrine ()->getManager ();	
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		
		$contacts = array();
		
		$contactSearch = new ContactSearchDto();
		$form   = $this->createContactSearchForm($contactSearch);
		$form->handleRequest($request);
		if ($form->isValid()) {
			
			//$contacts = $em->getRepository ( 'CupSiteManagementBundle:Contact' )->findBy(array(), array('id' => 'DESC'));
			$from = $contactSearch->getFrom();
			$to   = $contactSearch->getTo();
			
		 		if(!is_null($from)){
				$from = new \DateTime($from->format("Y-m-d")." 00:00:00");

			
				$to = new \DateTime($to->format("Y-m-d")." 23:59:59"); 			
              
				$qb = $em->getRepository ( 'CupSiteManagementBundle:Contact' )->createQueryBuilder("Contact"); 			
				$qb ->andWhere('Contact.date BETWEEN :from AND :to') ->setParameter('from', $from ) ->setParameter('to', $to) ; 			
				$contacts = $qb->getQuery()->getResult();
			}else{
				$contacts = $em->getRepository ( 'CupSiteManagementBundle:Contact' )->findAll();
			}
			
	//return $result;
			
			
			
			return $this->render('CupSiteManagementBundle:Default:contactList.html.twig',array(
					'form'   => $form->createView(),
					'contacts' => $contacts,
			));
		}
		
		
		return $this->render('CupSiteManagementBundle:Default:contactList.html.twig',array(
				'form'   => $form->createView(),
				'contacts' => $contacts,
		));
	}
    
      /**
     *
     * @param Contact $entity
     * @return unknown
     */
    private function createInvoiceForm(Invoice $entity)
    {
    	$form = $this->createForm(new InvoiceType(), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_generate_invoice'),
    			'method' => 'POST',
    	));
    	$form->add('submit', 'submit', array('label' => 'Generate Invoice'));
    	return $form;
    }
    
    /**
     *
     */
    public function generateInvoiceAction(Request $request){
    	$entity = new Invoice();
        $itemCollection = $entity->getItem();
        $item = new InvoiceItem();
        $itemCollection->add($item);
        
        $termCollection = $entity->getTerms();
        
        $terms = array();
        $terms[] = "All above prices mentioned are very competitive & final";
         $terms[] = "Manufacturing Schedule: within 12 working days, after artwork finalise";
         $terms[] = "Payment: 50% Advance & balance before dispatch.";
         $terms[] = "Exact quantity of cup manufactured will be known after manufacturing process completes. Final quantity can vary +/- 5% and accordingly final payment shall be made.";
         foreach($terms as $t){
        $term = new InvoiceTerm();
        $term->setDescription($t); 
        $termCollection->add($term);
         }
        $entity = $this->setDefaultsForInvoice($entity);
    	$form   = $this->createInvoiceForm($entity);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
             $itemCollection = $entity->getItem();
            $total = 0;
             foreach($itemCollection as $item){
                 $amount = $item->getRate()*$item->getQuantity();
                 $total += $amount;
                 $item->setAmount($amount); 
                 $item->setIsPercentage(0); 
                 $item->setInvoice($entity);                 
             }
            
            $termCollection = $entity->getTerms();
             foreach($termCollection as $term){
                 $term->setInvoice($entity);                 
             }
            $invoiceNo = $this->getInvoiceId();
            
            $entity->setInvoiceNo($invoiceNo);
            
            $serviceTax =  $entity->getServiceTax();
           // echo var_dump($serviceTax);
           // exit();
            $swachBharthCess =  $entity->getSwachBharthCess();
            $krishiKalyanCess =  $entity->getKrishiKalyanCess();
            
            $serviceTaxPer = $total*$serviceTax/100;
            $swachBharthCessPer = $total*$swachBharthCess/100;
            $krishiKalyanCessPer = $total*$krishiKalyanCess/100;
            
            
            $entity->setServiceTaxPer($serviceTaxPer);
            $entity->setSwachBharthCessPer($swachBharthCessPer);
            $entity->setKrishiKalyanCessPer($krishiKalyanCessPer);
            
            $total = $serviceTaxPer+$swachBharthCessPer+$krishiKalyanCessPer;
            
            $totalRound = round($total);
            
            $round = $totalRound - $total;
            $entity->setRoundingOff($round);
            $entity->setTotal($totalRound);
            
            $towords = new ToWords($totalRound);
            $entity->setTotalInWords($towords->words);
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($entity);
    		$em->flush();
            //exit();
          
            $invoice = $this->renderView(
                'CupSiteManagementBundle:Mail:invoice.html.twig',array(
    			'invoice' => $entity,
    			
    	       )
            );
            $path = 'invoice/'.$invoiceNo.'.pdf';
            //$this->get('knp_snappy.pdf')->generateFromHtml($invoice,$path);
            
            
            // Set parameters
            $apikey = '1d657ff8-6bd7-4e44-a57f-70942d7a5696';
           // $value = '<title>Test PDF conversion</title>This is the body'; // can aso be a url, starting with http..

            // Convert the HTML string to a PDF using those parameters.  Note if you have a very long HTML string use POST rather than get.  See example #5
            $result = file_get_contents("http://api.html2pdfrocket.com/pdf?apikey=" . urlencode($apikey) . "&value=" . urlencode($invoice));

            // Save to root folder in website
            file_put_contents($path, $result);
            
            $sendMail = $entity->getSendMail();
            if($sendMail){
            $email = $entity->getBuyerEmail();
            $subject = "Invoice ".$invoiceNo;
            $message = "Hello,<br>
            <br>
            Please find the attached Invoice for the month of Aug 2016 <br>
            Regards,<br>
            Team Gingercup";
             $mailService = $this->container->get( 'mail.services' );
    		$mailService->mailWithAttachment($email,$subject,$message,$path);
            }
            return $this->redirect($this->generateUrl('cup_site_management_campaign_generate_invoice'));
           
    	}
    	return $this->render('CupSiteManagementBundle:Invoice:generateInvoice.html.twig',array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	));
    }
    private function setDefaultsForInvoice($entity)
    {
        $entity->setInvoiceTitle('Invoice');
         date_default_timezone_set('Asia/Kolkata');
        $current= new \DateTime ();
        $entity->setInvoiceDate($current); 
        $entity->setModePayment('Online'); 
        $entity->setSellerName('Gingercup'); 
        $entity->setSellerAddress('1st Floor,3rd Cross'); 
        $entity->setSellerAddress2('Kundalahalli Colony, ITPL Main Road Bangalore-560037'); 
        // $entity->setSellerTIN('U74999KA2016PTC094910'); 
         $entity->setSellerTaxNo('AAFCT8447ASD001'); 
         $entity->setSellerPAN('AAFCT8447A'); 
         $entity->setServiceTax(14);
        $entity->setSwachBharthCess(0.5);
        $entity->setKrishiKalyanCess(0.5);
        return $entity;
    }
    private function getInvoiceId(){
            $characters = 'A5B0CD9EFG1HIJ3KLM46NOPQR7STUV8WXYZ';
    		$invoiceId = 'INV';
            date_default_timezone_set('Asia/Kolkata');
    		$current=date('d/m/Y');
    		list ( $d, $m, $y ) = explode ( '/', $current );
    		$invoiceId.=$d.$m.substr($y,2);
    		for ($i = 0; $i < 4; $i++) {
    			$invoiceId .= $characters[rand(0,strlen($characters)-1)];
    		}
        return $invoiceId;
    }
    
    /**
	 * contact list
	 * @return unknown
	 */
	public function invoiceListAction() {
		$em = $this->getDoctrine ()->getManager ();	
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		$invoiceList = $em->getRepository ( 'CupSiteManagementBundle:Invoice' )->findBy(array(), array('id' => 'DESC'));
	   return $this->render('CupSiteManagementBundle:Invoice:invoiceList.html.twig',array(
    			'invoiceList' => $invoiceList,
    	));
		
	}
    
    /**
     *
     * @param Contact $entity
     * @return unknown
     */
    private function createUserForm(GingerCupUser $entity)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new GingerCupUserType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_create_user'),
    			'method' => 'POST',
    	));
    	$form->add('submit', 'submit', array('label' => 'Add'));
    	return $form;
    }
    
    /**
     *
     */
    public function createUserAction(Request $request){
    	$entity = new GingerCupUser();
    	$form   = $this->createUserForm($entity);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
           // $entity->setUserType(4);
             $entity->setIsActive(1);
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($entity);
    		$em->flush();
            
        $type = $entity->getUserType(); 
        if($type==3){
        $email = $entity->getUserEmail();   
        $password = $entity->getUserPassword();   
        $userManager = $this->container->get ( 'fos_user.user_manager' );

		$user = $userManager->findUserByEmail ( $email );

			

		if (null === $user) {	

			// User with email not found. Do whatever you want here

			$user = $userManager->createUser ();

			$user->setEmail ( $email );

			$user->setUsername ( $email );

			$user->setEnabled ( true );

			$user->setPlainPassword ( $password );

			$user->addRole ( "ROLE_ADMIN" );

			$userManager->updateUser ( $user );

		} else {		

			$user->addRole ( "ROLE_ADMIN" );

			$user->setEnabled ( true );

			$user->setPlainPassword ( $password );

			$userManager->updateUser ( $user );

		}
            
        }
            
           
       return $this->redirect($this->generateUrl('cup_site_management_campaign_create_user'));
           
    	}
    	return $this->render('CupSiteManagementBundle:Master:createUser.html.twig',array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	));
    }
    /**
     *
     * @param Contact $entity
     * @return unknown
     */
    private function editUserForm(GingerCupUser $entity,$id)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new GingerCupUserType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_edit_user',array('id'=>$id)),
    			'method' => 'POST',
    	));
    	$form->add('submit', 'submit', array('label' => 'Update'));
    	return $form;
    }
    /**
     *
     */
    public function editUserAction(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
    	$entity = $em->getRepository('CupSiteManagementBundle:GingerCupUser')->find($id);
    	$form   = $this->editUserForm($entity,$id);
    	$form->handleRequest($request);
    	if ($form->isValid()) {             
    		$em->merge($entity);
    		$em->flush();
    		
    		
    		
    		$type = $entity->getUserType();
    		if($type==3){
    			$email = $entity->getUserEmail();
    			$password = $entity->getUserPassword();
    			$userManager = $this->container->get ( 'fos_user.user_manager' );
    		
    			$user = $userManager->findUserByEmail ( $email );
    		
    				
    		
    			if (null === $user) {
    		
    				// User with email not found. Do whatever you want here
    		
    				$user = $userManager->createUser ();
    		
    				$user->setEmail ( $email );
    		
    				$user->setUsername ( $email );
    		
    				$user->setEnabled ( true );
    		
    				$user->setPlainPassword ( $password );
    		
    				$user->addRole ( "ROLE_ADMIN" );
    		
    				$userManager->updateUser ( $user );
    		
    			} else {
    		
    				$user->addRole ( "ROLE_ADMIN" );
    		
    				$user->setEnabled ( true );
    		
    				$user->setPlainPassword ( $password );
    		
    				$userManager->updateUser ( $user );
    		
    			}
    		
    		}
            
           
       return $this->redirect($this->generateUrl('cup_site_management_campaign_user_list'));
           
    	}
    	return $this->render('CupSiteManagementBundle:Master:createUser.html.twig',array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	));
    }
    
    /**
     *
     * @param Contact $entity
     * @return unknown
     */
    private function createLocationForm(Location $entity)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new LocationType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_add_location'),
    			'method' => 'POST',
    	));
    	$form->add('submit', 'submit', array('label' => 'Add'));
    	return $form;
    }
    
    /**
     *
     */
    public function addLocationAction(Request $request){
    	$entity = new Location();
    	$form   = $this->createLocationForm($entity);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
             $city = $em->getRepository('CupSiteManagementBundle:City')->find($entity->getCity());
            $entity->setCity($city);
    		$em->persist($entity);
    		$em->flush();
            
           
       return $this->redirect($this->generateUrl('cup_site_management_campaign_add_location'));
           
    	}
    	return $this->render('CupSiteManagementBundle:Master:addLocation.html.twig',array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	));
    }
    
     /**
     *
     * @param Contact $entity
     * @return unknown
     */
    private function createEditLocationForm(Location $entity,$id)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new LocationType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_edit_location',array('id'=>$id)),
    			'method' => 'POST',
    	));
    	$form->add('submit', 'submit', array('label' => 'Update'));
    	return $form;
    }
    
    /**
     *
     */
    public function editLocationAction(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
    	$entity = $em->getRepository('CupSiteManagementBundle:Location')->find($id);
         $entity->setCity($entity->getCity()->getId());
    	$form   = $this->createEditLocationForm($entity,$id);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		
             $city = $em->getRepository('CupSiteManagementBundle:City')->find($entity->getCity());
            $entity->setCity($city);
    		$em->merge($entity);
    		$em->flush();
            
           
       return $this->redirect($this->generateUrl('cup_site_management_campaign_location_list'));
           
    	}
    	return $this->render('CupSiteManagementBundle:Master:addLocation.html.twig',array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	));
    }
    
     /**
     *
     * @param Contact $entity
     * @return unknown
     */
    private function createCityForm(City $entity)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new CityType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_add_city'),
    			'method' => 'POST',
    	));
    	$form->add('submit', 'submit', array('label' => 'Add'));
    	return $form;
    }
    
    /**
     *
     */
    public function addCityAction(Request $request){
    	$entity = new City();
    	$form   = $this->createCityForm($entity);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($entity);
    		$em->flush();
            
           
       return $this->redirect($this->generateUrl('cup_site_management_campaign_add_city'));
           
    	}
    	return $this->render('CupSiteManagementBundle:Master:addCity.html.twig',array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	));
    }
     /**
     *
     * @param Contact $entity
     * @return unknown
     */
    private function createLocationSearchForm(Location $entity)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new LocationSearchType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_location_list'),
    			'method' => 'GET',
    	));
    	$form->add('submit', 'submit', array('label' => 'Search'));
    	return $form;
    }
     /**
	 * contact list
	 * @return unknown
	 */
	public function locationListAction(Request $request) {
		
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
            if (! $security->isGranted ( 'ROLE_ADMIN' ))
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
        $locations = array();
        $entity = new Location();
    	$form   = $this->createLocationSearchForm($entity);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
        $em = $this->getDoctrine ()->getManager ();	
            $city = $entity->getCity();
		$locations = $em->getRepository ( 'CupSiteManagementBundle:Location' )->findBy(array('city'=>$city), array('id' => 'DESC'));
            return $this->render('CupSiteManagementBundle:Master:locationList.html.twig',array(
                    'locations' => $locations,
                    'form'   => $form->createView(),
            ));
        }
	   return $this->render('CupSiteManagementBundle:Master:locationList.html.twig',array(
    			'locations' => $locations,
                'form'   => $form->createView(),
    	));
		
	}
     /**
     *
     * @param Contact $entity
     * @return unknown
     */
    private function createUserSearchForm(GingerCupUser $entity)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new UserSearchType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_user_list'),
    			'method' => 'GET',
    	));
    	$form->add('submit', 'submit', array('label' => 'Search'));
    	return $form;
    }
      /**
	 * contact list
	 * @return unknown
	 */
	public function userListAction(Request $request) {

		$em = $this->getDoctrine ()->getManager ();	
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
                 $users = array();
        $entity = new GingerCupUser();
    	$form   = $this->createUserSearchForm($entity);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
             $city = $entity->getCityId();
             $userType = $entity->getUserType();
            $search = array();
            if(!is_null($city))
                $search['cityId'] = $city;
            if(!is_null($userType))
                $search['userType'] = $userType;
		      $users = $em->getRepository ( 'CupSiteManagementBundle:GingerCupUser' )->findBy($search, array('id' => 'DESC'));
            return $this->render('CupSiteManagementBundle:Master:userList.html.twig',array(
    			'users' => $users,
                'form'   => $form->createView(),
    	));
        }
	   return $this->render('CupSiteManagementBundle:Master:userList.html.twig',array(
    			'users' => $users,
                'form'   => $form->createView(),
    	));
		
	}
    
     /**
     *
     * @param Contact $entity
     * @return unknown
     */
    private function createConsumerForm(Consumer $entity)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new ConsumerType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_add_consumer'),
    			'method' => 'POST',
    	));
    	$form->add('submit', 'submit', array('label' => 'Add'));
    	return $form;
    }
    
    
    /**
     *
     */
    public function addConsumerAction(Request $request){
    	$entity = new Consumer();
    	
    	$entity->setLat(0);
    	$entity->setLng(0);
    	$entity->setCupSizes2(0);
    	$entity->setCupQuantityPerDay2(0);
    	$entity->setCupSizes3(0);
    	$entity->setCupQuantityPerDay3(0);
    		
    	$form   = $this->createConsumerForm($entity);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
            date_default_timezone_set('Asia/Kolkata');
    		$current= new \Datetime();
            $entity->setCreatedAt($current);
    		$em->persist($entity);
    		$em->flush();
            
           
       return $this->redirect($this->generateUrl('cup_site_management_campaign_add_consumer'));
           
    	}
    	return $this->render('CupSiteManagementBundle:Master:addConsumer.html.twig',array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	));
    }
    
     /**
     *
     * @param Contact $entity
     * @return unknown
     */
    private function createEditConsumerForm(Consumer $entity,$id)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new ConsumerType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_edit_consumer',array('id'=>$id)),
    			'method' => 'POST',
    	));
    	$form->add('submit', 'submit', array('label' => 'Update'));
    	return $form;
    }
    
    /**
     *
     */
    public function editConsumerAction(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
    	$entity = $em->getRepository('CupSiteManagementBundle:Consumer')->find($id);
    	$form   = $this->createEditConsumerForm($entity,$id);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em->merge($entity);
    		$em->flush();
            
           
       return $this->redirect($this->generateUrl('cup_site_management_campaign_consumer_list'));
           
    	}
    	return $this->render('CupSiteManagementBundle:Master:addConsumer.html.twig',array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	));
    }
    
    
    
    /**
     *
     * @param Contact $entity
     * @return unknown
     */
    private function createConsumerSearchForm(Consumer $entity)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new ConsumerSearchType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_consumer_list'),
    			'method' => 'GET',
    	));
    	$form->add('submit', 'submit', array('label' => 'Search'));
    	return $form;
    }
     /**
	 * contact list
	 * @return unknown
	 */
	public function consumerListAction(Request $request) {
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
            if (! $security->isGranted ( 'ROLE_ADMIN' ))
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
        $consumers = array();
        $entity = new Consumer();
    	$form   = $this->createConsumerSearchForm($entity);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
        $user = $entity->getCreatedBy();
            
        $city = $entity->getCity();           
        $type = $entity->getEstabType();
        $name = $entity->getEstabName();
        $mobile = $entity->getMobile();
        $rating = $entity->getRating();
            
        if(!is_null($name))
            $name = '%'.$name.'%';
        if(!is_null($mobile))
            $mobile = '%'.$mobile.'%';
            
        $from_date = $entity->getStartDate ();
        $to_date = $entity->getEndDate ();


			if($from_date)

			{
               // list ( $d, $m, $y ) = explode ( '/', $from_date );
				//$from_date = new \Datetime($y.'-'.$m.'-'.$d);

			}

			else

			{

				$from_date = new \Datetime('2012-01-01');

			}
            
            if($to_date){
           // list ( $d, $m, $y ) = explode ( '/', $to_date );
			//$to_date = new \Datetime($y.'-'.$m.'-'.$d);
            }else{
             $to_date = new \Datetime();
            }
            //echo var_dump($from_date);
             //echo var_dump($to_date);
            $from_date->setTime(00, 00);
            $to_date->setTime(23, 59);
			$from_date->format('Y-m-d');			
			$to_date->format('Y-m-d');
            
            

			$em = $this->getDoctrine ()->getManager ();

			
            
				$doctrineQuery = $this->getDoctrine ()->getRepository ( 'CupSiteManagementBundle:Consumer' )->createNamedQuery ( 'list' );

				$doctrineQuery->setParameter ( 'start', $from_date ); 

				$doctrineQuery->setParameter ( 'end', $to_date ); 

				$doctrineQuery->setParameter ( 'createdBy',$user ); 
                $doctrineQuery->setParameter ( 'city',$city ); 
                $doctrineQuery->setParameter ( 'type',$type );
                $doctrineQuery->setParameter ( 'rating',$rating );
                $doctrineQuery->setParameter ( 'name',$name ); 
                $doctrineQuery->setParameter ( 'mobile',$mobile ); 

				$consumers = $doctrineQuery->getResult ();
             $export = $request->get('export');
            if($export){
            
                $consumerList = $this->getconsumerAsArray($consumers);
            
                $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
    	 
    	
    	       // We'll be outputting an excel file
    	       header('Content-type: application/vnd.ms-excel');
    
    	       // It will be called file.xls
    	       header('Content-Disposition: attachment; filename="consumers.xlsx"');
    
    
    	
    	       $phpExcelObject->getSheet('0')->fromArray($consumerList, NULL, 'A1');
    	
    	       // Write file to the browser
    	       $objWriter = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel2007');
    	       $objWriter->save('php://output');
    	       return new response('true');
            }
            
            
		//$consumers = $em->getRepository ( 'CupSiteManagementBundle:Consumer' )->findBy(array('createdBy'=>$user), array('id' => 'DESC'));
            
        return $this->render('CupSiteManagementBundle:Master:consumerList.html.twig',array(
    			'consumers' => $consumers,
                'form'   => $form->createView(),
    	));
        }
	   return $this->render('CupSiteManagementBundle:Master:consumerList.html.twig',array(
    			'consumers' => $consumers,
                'form'   => $form->createView(),
    	));
		
	}
    
    /**
	 *
	 * @param unknown $locations
	 * @return multitype:unknown
	 */
	public function getconsumerAsArray($consumers) {
		$tempList = array();
        $tempList[] = array('id','estabName','contactName','contactNo','altNo','emailId','address','landMark','cupSizes','cupSizes2','cupSizes3','cupQuantityPerDay','cupQuantityPerDay2','cupQuantityPerDay3','reach','location','city','typeName','rating');
		foreach($consumers as $consumer)
		{
			
			$id = $consumer['id'];
            $estabName = $consumer['estabName'];
            $contactName = $consumer['contactName'];
            $contactNo = $consumer['contactNo'];
            $altNo = $consumer['altNo'];
            $emailId = $consumer['emailId'];
            
            $address = $consumer['address'];
            $landMark = $consumer['landMark'];
             $cupSizes = $consumer['cupSizes'];
            $cupSizes2 = $consumer['cupSizes2'];
            $cupSizes3 = $consumer['cupSizes3'];
            
             $cupQuantityPerDay = $consumer['cupQuantityPerDay'];
             $cupQuantityPerDay2 = $consumer['cupQuantityPerDay2'];
             $cupQuantityPerDay3 = $consumer['cupQuantityPerDay3'];
            
            $reach = $consumer['reach'];
            $location = $consumer['location'];
            $city = $consumer['city'];
            $typeName = $consumer['typeName'];
            $rating = $consumer['rating'];
			$tempList[] = array($id,$estabName,$contactName,$contactNo,$altNo,$emailId,$address,$landMark,$cupSizes,$cupSizes2,$cupSizes3,$cupQuantityPerDay,$cupQuantityPerDay2,$cupQuantityPerDay3,$reach,$location,$city,$typeName,$rating);
		}
		return $tempList;
	
	}
    
     /**
     * Finds and displays a design in 3D view.
     *
     */
    public function deleteConsumerAction(Request $request,$id)
    {
        $security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
            if (! $security->isGranted ( 'ROLE_ADMIN' ))
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
        $em = $this->getDoctrine ()->getManager ();	
        $consumer = $em->getRepository ( 'CupSiteManagementBundle:Consumer' )->find($id);        
         $em->remove($consumer);
        $em->flush();
        return new Response('true');
        
    }
     /**
     * Finds and displays a design in 3D view.
     *
     */
    public function deleteLocationAction(Request $request,$id)
    {
        $security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
            if (! $security->isGranted ( 'ROLE_ADMIN' ))
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
        $em = $this->getDoctrine ()->getManager ();	
        $consumer = $em->getRepository ( 'CupSiteManagementBundle:Location' )->find($id);        
         $em->remove($consumer);
        $em->flush();
        return new Response('true');
        
    }
    
    
    
     /**
     *
     * @param EstabType $entity
     * @return unknown
     */
    private function createEstabForm(EstabType $entity)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new EstabTypeType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_add_estab_type'),
    			'method' => 'POST',
    	));
    	$form->add('submit', 'submit', array('label' => 'Add'));
    	return $form;
    }
    
    
    /**
     *
     */
   public function addEstabTypeAction(Request $request){
     	$entity = new EstabType();
    	$form   = $this->createEstabForm($entity);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($entity);
    		$em->flush();
            
           
       return $this->redirect($this->generateUrl('cup_site_management_campaign_add_estab_type'));
           
    	}
    	return $this->render('CupSiteManagementBundle:Master:addEstabType.html.twig',array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	));
    }
    
     /**
     *
     * @param EstabType $entity
     * @return unknown
     */
    private function createEditEstabForm(EstabType $entity,$id)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new EstabTypeType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_edit_estab_type',array('id'=>$id)),
    			'method' => 'POST',
    	));
    	$form->add('submit', 'submit', array('label' => 'Update'));
    	return $form;
    }
    
    /**
     *
     */
    public function editEstabTypeAction(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
    	$entity = $em->getRepository('CupSiteManagementBundle:EstabType')->find($id);
    	$form   = $this->createEditEstabForm($entity,$id);
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em->merge($entity);
    		$em->flush();
            
           
       return $this->redirect($this->generateUrl('cup_site_management_campaign_estab_type_list'));
           
    	}
    	return $this->render('CupSiteManagementBundle:Master:addEstabType.html.twig',array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	));
    }
    
    
    
    /**
     *
     * @param EstabType $entity
     * @return unknown
     */
    private function createEstabSearchForm(EstabType $entity)
    {
         $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm(new EstabTypeType($cupService), $entity, array(
    			'action' => $this->generateUrl('cup_site_management_campaign_estab_type_list'),
    			'method' => 'GET',
    	));
    	$form->add('submit', 'submit', array('label' => 'Search'));
    	return $form;
    }
    public function deleteEstabTypeAction(Request $request,$id)
    {
    	$security = $this->container->get ( 'security.context' );
    	if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
    		if (! $security->isGranted ( 'ROLE_ADMIN' ))
    			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
    	}
    	$em = $this->getDoctrine ()->getManager ();
    	$estubTypes = $em->getRepository ( 'CupSiteManagementBundle:EstabType' )->find($id);
    	$em->remove($estubTypes);
    	$em->flush();
    	return new Response('true');
    
    }
     /**
	 * contact list
	 * @return unknown
	 */
	public function estabTypeListAction(Request $request) {
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
        $consumers = array();
        $entity = new EstabType();
    	$form   = $this->createEstabSearchForm($entity);
    	$form->handleRequest($request);
    	//if ($form->isValid()) {
        $em = $this->getDoctrine ()->getManager ();
       // $user = $entity->getCreatedBy();
		$estubTypes = $em->getRepository ( 'CupSiteManagementBundle:EstabType' )->findBy(array(), array('id' => 'DESC'));
            
        return $this->render('CupSiteManagementBundle:Master:estabTypeList.html.twig',array(
    			'estubTypes' => $estubTypes,
                'form'   => $form->createView(),
    	));
       // }
	   return $this->render('CupSiteManagementBundle:Master:estabTypeList.html.twig',array(
    			'estubTypes' => $estubTypes,
                'form'   => $form->createView(),
    	));
		
	}
	/**
	 *
	 * @param EstabType $entity
	 * @return unknown
	 */
	private function createEditActivityForm(ActivityType $entity,$id)
	{
		$cupService = $this->container->get( 'cup.services' );
		$form = $this->createForm(new ActivityTypeType($cupService), $entity, array(
				'action' => $this->generateUrl('cup_site_management_campaign_edit_activity_type',array('id'=>$id)),
				'method' => 'POST',
		));
		$form->add('submit', 'submit', array('label' => 'Update'));
		return $form;
	}
	
	/**
	 *
	 */
	/**
	 *
	 * @param ActivityType $entity
	 * @return unknown
	 */
	private function createActivityForm(ActivityType $entity)
	{
		$cupService = $this->container->get( 'cup.services' );
		$form = $this->createForm(new ActivityTypeType($cupService), $entity, array(
				'action' => $this->generateUrl('cup_site_management_campaign_add_activity_type'),
				'method' => 'POST',
		));
		$form->add('submit', 'submit', array('label' => 'Add'));
		return $form;
	}
	
	
	/**
	 *
	 */
	public function addActivityTypeAction(Request $request){
		$entity = new ActivityType();
		$form   = $this->createActivityForm($entity);
		$form->handleRequest($request);
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($entity);
			$em->flush();
	
			 
			return $this->redirect($this->generateUrl('cup_site_management_campaign_add_activity_type'));
			 
		}
		return $this->render('CupSiteManagementBundle:Master:addActivityType.html.twig',array(
				'entity' => $entity,
				'form'   => $form->createView(),
		));
	}
	
	/**
	 *
	 * @param ActivityType $entity
	 * @return unknown
	 */	
	public function editActivityTypeAction(Request $request,$id){
		$em = $this->getDoctrine()->getManager();
		$entity = $em->getRepository('CupSiteManagementBundle:ActivityType')->find($id);
		$form   = $this->createEditActivityForm($entity,$id);
		$form->handleRequest($request);
		if ($form->isValid()) {
			$em->merge($entity);
			$em->flush();
			
			return $this->redirect($this->generateUrl('cup_site_management_campaign_activity_type_list'));
	
		} 
			return $this->render('CupSiteManagementBundle:Master:addActivityType.html.twig',array(
				'entity' => $entity,
				'form'   => $form->createView(),
		));
	
	}
	public function deleteActivityTypeAction(Request $request,$id)
	{
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
			if (! $security->isGranted ( 'ROLE_ADMIN' ))
				return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		$em = $this->getDoctrine ()->getManager ();
		$activityTypes = $em->getRepository ( 'CupSiteManagementBundle:ActivityType' )->find($id);
		$em->remove($activityTypes);
		$em->flush();
		return new Response('true');
	
	}
	public function activityTypeListAction(Request $request) {
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		$consumers = array();
	//	$entity = new ActivityType();
	///	$form   = $this->createEstabSearchForm($entity);
	//	$form->handleRequest($request);
		//if ($form->isValid()) {
		$em = $this->getDoctrine ()->getManager ();
		// $user = $entity->getCreatedBy();
		$activityTypes = $em->getRepository ( 'CupSiteManagementBundle:ActivityType' )->findBy(array(), array('id' => 'DESC'));
		
	
		return $this->render('CupSiteManagementBundle:Master:activityTypeList.html.twig',array(
				'activityTypes' => $activityTypes,
              //  'form'   => $form->createView(),
		));
		// }
		return $this->render('CupSiteManagementBundle:Master:activityTypeList.html.twig',array(
				'activityTypes' => $activityTypes,
               // 'form'   => $form->createView(),
		));
	
	}
    
     /**
     * File Upload form generation
     * @param Instructor $entity
     * @return unknown
     */
    public function createFileUploadForm(UploadExcel $uploadExcel) {
        $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm ( new UploadExcelType ($cupService), $uploadExcel, array (
    			'action' => $this->generateUrl ( 'cup_site_management_bulk_consumer_upload' ),
    			'method' => 'POST'
    	) );
    	$form->add ( 'submit', 'submit', array (
    			'label' => 'Upload'
    	) );
    	return $form;
    }
    public function bulkUploadConsumerAction(Request $request){
    	$security = $this->container->get ( 'security.context' );
    	if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
            if (! $security->isGranted ( 'ROLE_ADMIN' ))
    		return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
    	}
    	$status = array();
    	$uploadExcel = new UploadExcel ();
    	$form = $this->createFileUploadForm ( $uploadExcel );
    	$form->handleRequest ( $request );
    	if ($form->isValid ()) {
            $user = $security->getToken ()->getUser ();
            if(is_object($user)){
                $email = $user->getUserName ();
            }
            $em = $this->getDoctrine()->getManager();
            $addedBy = 'Guest';
             $users = $em->getRepository('CupSiteManagementBundle:GingerCupUser')->findBy(array('userEmail'=>$email));
            if($users){
                $user = $users[0];
                $addedBy = $user->getId();
            }
                
    		$filenames = $uploadExcel->getFilePath();
            $city = $uploadExcel->getCity();
    		$phpExcelObject = $this->xlsCreate($filenames);
    		$status = $this->createBookings($phpExcelObject,$addedBy,$city);
    		return $this->render ( 'CupSiteManagementBundle:bulk:uploadExcel.html.twig', array (
    			'entity' => $uploadExcel,
    			'status' => $status,
    			'form' => $form->createView ()
    		) );
    	}
    	return $this->render ( 'CupSiteManagementBundle:bulk:uploadExcel.html.twig', array (
    			'entity' => $uploadExcel,
    			'status' => $status,
    			'form' => $form->createView ()
    	) );
    }
    
     /**
     * File Upload form generation
     * @param Instructor $entity
     * @return unknown
     */
    public function createLocationUploadForm(UploadExcel $uploadExcel) {
        $cupService = $this->container->get( 'cup.services' );
    	$form = $this->createForm ( new UploadLocationExcelType ($cupService), $uploadExcel, array (
    			'action' => $this->generateUrl ( 'cup_site_management_bulk_location_upload' ),
    			'method' => 'POST'
    	) );
    	$form->add ( 'submit', 'submit', array (
    			'label' => 'Upload'
    	) );
    	return $form;
    }
    public function bulkUploadLocationAction(Request $request){
       
    	$security = $this->container->get ( 'security.context' );
    	if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
            if (! $security->isGranted ( 'ROLE_ADMIN' ))
    		return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
    	}
    	$status = array();
    	$uploadExcel = new UploadExcel ();
    	$form = $this->createLocationUploadForm ( $uploadExcel );
    	$form->handleRequest ( $request );
    	if ($form->isValid ()) {
                            
    		$filenames = $uploadExcel->getFilePath();
    		$phpExcelObject = $this->xlsCreate($filenames);
    		$status = $this->createLocations($phpExcelObject);
    		return $this->render ( 'CupSiteManagementBundle:bulk:uploadLocationExcel.html.twig', array (
    			'entity' => $uploadExcel,
    			'status' => $status,
    			'form' => $form->createView ()
    		) );
    	}
    	return $this->render ( 'CupSiteManagementBundle:bulk:uploadLocationExcel.html.twig', array (
    			'entity' => $uploadExcel,
    			'status' => $status,
    			'form' => $form->createView ()
    	) );
    }
    
    /**
     * upload data from excel sheet
     * @param Instructor $entity
     * @return unknown
     */
    public function xlsCreate($filenames){
    	$phpExcelObject = $this->get('phpexcel')->createPHPExcelObject($filenames);    	
    	 return $phpExcelObject;
    	
    }
    
    /**
     * 
     * @param unknown $phpExcelObject
     * @return unknown
     */
    public function createBookings($phpExcelObject,$addedBy,$city){
    	
        $consumerArray = array();
    	$worksheetArray = $this->getWorkSheetArray($phpExcelObject);
    	$consumerArray = $this->addConsumers($worksheetArray[0],$consumerArray,$city);    	    	
    	$status = $this->saveConsumers($consumerArray,$addedBy);    	
    	//echo var_dump($consumerArray);
    	//echo var_dump($status);
    	//exit(); 
    	return $status;
    }
    
    /**
     * 
     * @param unknown $phpExcelObject
     * @return unknown
     */
    public function createLocations($phpExcelObject){
    	
        $locationArray = array();
    	$worksheetArray = $this->getWorkSheetArray($phpExcelObject);
    	$consumerArray = $this->addLocations($worksheetArray[0],$locationArray);    	    	
    	$status = $this->saveLocations($consumerArray);    	
    	//echo var_dump($consumerArray);
    	//echo var_dump($status);
    	//exit(); 
    	return $status;
    }
    
    	/**
	 *
	 * @param unknown $phpExcelObject
	 * @return unknown
	 */
	public function getWorkSheetArray($phpExcelObject){
		$worksheetArray = array();
		foreach ($phpExcelObject ->getWorksheetIterator() as $worksheet) {
			$worksheetArray[]= $worksheet;
		}
		return $worksheetArray;
	}
    
    /**
       * 
       * @param unknown $worksheet
       * @param unknown $customerArray
       * @return \Drive\CustomerBundle\Dto\Customer
       */
      public function addConsumers($worksheet,$consumerArray,$city){
      	foreach ($worksheet->getRowIterator() as $row) {
      		if($row->getRowIndex()==1){
      			continue;
      		}
      		$consumer = new Consumer();
            $consumer->setCity($city);
      		$errors = $consumer->getErrors();
      		$counter = 1;
      		$flag = false;
      		$cellIterator = $row->getCellIterator();
      		$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
      		foreach ($cellIterator as $cell) {
      			if (!is_null($cell)) {
      				if (!is_null($cell->getCalculatedValue())){
      					//$flag = true;
      				switch ($counter){
      					case 1:
                            if (!is_null($cell->getCalculatedValue()))
      					         $flag = true;
      						$consumer->setEstabName($cell->getCalculatedValue());
      						break;
      					case 2:
      						$consumer->setContactName($cell->getCalculatedValue());
      						break;
      					case 3:
      						$consumer->setContactNo($cell->getCalculatedValue());
      						break;
      					case 4:
      						$consumer->setAltNo($cell->getCalculatedValue());
      						break;
      					case 5:
      						$consumer->setEmailId($cell->getCalculatedValue());
      						break;
      					case 6:
      						$consumer->setAddress($cell->getCalculatedValue());
      						break;
      					case 7:
                            if (is_null($cell->getCalculatedValue()))
                               $errors[] = 'please add location for '.$consumer->getEstabName(); 
      						$consumer->setLocation($cell->getCalculatedValue());
      						break;
      					case 8:
                            if (is_null($cell->getCalculatedValue()))
                                $errors[] = 'please add location for '.$consumer->getEstabName(); 
                            if (!preg_match("/^-?[1-9][0-9]*$/D", $cell->getCalculatedValue()))
                                $errors[] = 'please add location for '.$consumer->getEstabName(); 
      						$consumer->setLocation($cell->getCalculatedValue());
      						break;
      					case 9:
      						$consumer->setLandMark($cell->getCalculatedValue());
      						break;
      					case 10:
      						$consumer->setLat($cell->getCalculatedValue());
      						break;
      					case 11:
      						$consumer->setLng($cell->getCalculatedValue());
      						break;
      					case 12:
                            if (is_null($cell->getCalculatedValue()))
                               $errors[] = 'please add EstabType for '.$consumer->getEstabName(); 
      						$consumer->setEstabType($cell->getCalculatedValue());
      						break;
      					case 13:
                            if (is_null($cell->getCalculatedValue()))
                                $errors[] = 'please add EstabType for '.$consumer->getEstabName(); 
                            if (!preg_match("/^-?[1-9][0-9]*$/D", $cell->getCalculatedValue()))
                               $errors[] = 'please add EstabType for '.$consumer->getEstabName(); 
							$consumer->setEstabType($cell->getCalculatedValue());
      						break;
      					case 14:
      						$consumer->setCupSizes($cell->getCalculatedValue());
      						break;
      					case 15:
      						$consumer->setCupQuantityPerDay($cell->getCalculatedValue());
      						break;
      					case 16:
      						$consumer->setCupSizes2($cell->getCalculatedValue());
      						break;
      					case 17:
      						$consumer->setCupQuantityPerDay2($cell->getCalculatedValue());
      						break;
      					case 18:     						
      						$consumer->setCupSizes3($cell->getCalculatedValue());
      						break;
      					case 19:
      						$consumer->setCupQuantityPerDay3($cell->getCalculatedValue());
      						break;
      					case 20:
                            if (is_null($cell->getCalculatedValue()))
                                $errors[] = 'please add Reach for '.$consumer->getEstabName(); 
                            if (!preg_match("/^-?[1-9][0-9]*$/D", $cell->getCalculatedValue()))
                               $errors[] = 'please add Reach for '.$consumer->getEstabName(); 
      						$consumer->setReach($cell->getCalculatedValue());
      						break;
                        case 21:
      						$consumer->setRemark($cell->getCalculatedValue());
      						break;
      					
      				
      				}
      			}
      			}
      			$counter++;
      		}
             $consumer->setErrors($errors);
      		if($flag==true)
      		$consumerArray[]=$consumer;
      	}
      	return $consumerArray;
      }
    
    
    /**
     * 
     * @param unknown $consumerArray
     * @return multitype:
     */
    private function saveConsumers($consumerArray,$addedBy) {
    	$status = array();
    	$status[] = 'Uploaded Successfully';
    	foreach ($consumerArray as $consumer) {
            $errors = $consumer->getErrors();
            if(count($errors)>0){
                foreach ($errors as $error) {
                    $status[]=$error;
                }
            }else{
    		try {    			
	    		$em = $this->getDoctrine()->getManager();
                date_default_timezone_set('Asia/Kolkata');
                $current= new \Datetime();
                $consumer->setCreatedAt($current);
                $consumer->setCreatedBy($addedBy);
                $em->persist($consumer);
                $em->flush();
	    	}catch(\Exception $ex){
	    		$name = $consumer->getEstabName();
    			$status[]='Problem with Estub '.$name.' got Failed';
    					if (!$em->isOpen()) {
                         $em = $em->create(
                            $em->getConnection(),
                            $em->getConfiguration()
                         );
		              }
    			
    		}
            }
    	}
    	return $status;
    }
    
    
     /**
       * 
       * @param unknown $worksheet
       * @param unknown $customerArray
       * @return \Drive\CustomerBundle\Dto\Customer
       */
      public function addLocations($worksheet,$locationArray){
      	foreach ($worksheet->getRowIterator() as $row) {
      		if($row->getRowIndex()==1){
      			continue;
      		}
      		$location = new Location();
      		 $errors = $location->getErrors();
      		$counter = 1;
      		$flag = false;
      		$cellIterator = $row->getCellIterator();
      		$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
      		foreach ($cellIterator as $cell) {
      			if (!is_null($cell)) {
      				if (!is_null($cell->getCalculatedValue())){
      					//$flag = true;
      				switch ($counter){
      					case 1:
                            if (!is_null($cell->getCalculatedValue()))
      					         $flag = true;
      						$location->setName($cell->getCalculatedValue());
      						break;
      					case 2:
      						$location->setCity($cell->getCalculatedValue());
      						break;
      					case 3:
                            $city = trim($cell->getCalculatedValue());
                            if (is_null($city))
                                $errors[] = 'please add city for '.$location->getName(); 
                            if (!preg_match("/^-?[1-9][0-9]*$/D", $city))
                               $errors[] = 'please add city for '.$location->getName(); 
      						$location->setCity($cell->getCalculatedValue());
      						break;
      					
      				
      				}
      			}
      			}
      			$counter++;
      		}
            $location->setErrors($errors);
      		if($flag==true)
      		$locationArray[]=$location;
      	}
      	return $locationArray;
      }
    
    /**
     * 
     * @param unknown $locationArray
     * @return multitype:
     */
    private function saveLocations($locationArray) {
    	$status = array();
    	$status[] = 'Uploaded Successfully';
    	foreach ($locationArray as $location) {
             $errors = $location->getErrors();   
            //echo var_dump($errors);
            if(count($errors)>0){
                foreach ($errors as $error) {
                    $status[]=$error;
                }
            }else{
    		try {    			
	    		$em = $this->getDoctrine()->getManager();
                $city = $location->getCity();
                $city = $em->getRepository('CupSiteManagementBundle:City')->find($city);
                $location->setCity($city);
                $em->persist($location);
                $em->flush();
	    	}catch(\Exception $ex){
	    		$name = $location->getName();
    			$status[]='Problem with '.$name.' got Failed';
    					if (!$em->isOpen()) {
                         $em = $em->create(
                            $em->getConnection(),
                            $em->getConfiguration()
                         );
		              }
    			
    		}
            }
    	}
       // exit();
    	return $status;
    }


    
    
    /**
	 *
	 * @param unknown $locations
	 * @return multitype:unknown
	 */
	public function getLocationsAsArray($locations) {
		$tempList = array();
		foreach($locations as $location)
		{
			$locationName = trim($location->getName());
			$id = $location->getId();
			$tempList[] = array($locationName,$id);
		}
		return $tempList;
	
	}
    
     /**
	 *
	 * @param unknown $locations
	 * @return multitype:unknown
	 */
	public function getEstubAsArray($locations) {
		$tempList = array();
		foreach($locations as $location)
		{
			$locationName = trim($location->getTypeName());
			//if($location->getId()<4)
            $id = $location->getId();
			$tempList[] = array($locationName,$id);
		}
		return $tempList;
	
	}
    
    
     /**
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadSampleAction(Request $request) {
    	$view = 'docs/consumers.xlsx';
    	$phpExcelObject = $this->get('phpexcel')->createPHPExcelObject($view);
    	 $cupService = $this->container->get( 'cup.services' );
    	
    	$session = $request->getSession();
        $city = $request->get('city');
    	$locations = $cupService->getLocationByCity($city);
    	$locations = $this->getLocationsAsArray($locations);
    	
    	$estubs = $cupService->getEstubTypes();
    	$estubs = $this->getEstubAsArray($estubs);
        //echo var_dump($estubs);
        //echo var_dump($locations);
        //exit();
    	// We'll be outputting an excel file
    	header('Content-type: application/vnd.ms-excel');
    
    	// It will be called file.xls
    	header('Content-Disposition: attachment; filename="consumers.xlsx"');
    
    
    	
    	$phpExcelObject->getSheet('1')->fromArray($locations, NULL, 'A2');
    	$phpExcelObject->getSheet('1')->fromArray($estubs, NULL, 'E2');
    	
    	// Write file to the browser
    	$objWriter = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel2007');
    	$objWriter->save('php://output');
    	return new response('true');
    }
    
     /**
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadLocationSampleAction(Request $request) {
    	$view = 'docs/locations.xlsx';
    	$phpExcelObject = $this->get('phpexcel')->createPHPExcelObject($view);
    	 $cupService = $this->container->get( 'cup.services' );
    	
    	$cityList = $cupService->getCity();
    	$cityList = $this->getLocationsAsArray($cityList);
    	
    	// We'll be outputting an excel file
    	header('Content-type: application/vnd.ms-excel');
    
    	// It will be called file.xls
    	header('Content-Disposition: attachment; filename="locations.xlsx"');
    
    
    	
    	$phpExcelObject->getSheet('1')->fromArray($cityList, NULL, 'A2');
    	
    	// Write file to the browser
    	$objWriter = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel2007');
    	$objWriter->save('php://output');
    	return new response('true');
    }
    
}
