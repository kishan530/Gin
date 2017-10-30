<?php
namespace Cup\SiteManagementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cup\SiteManagementBundle\Form\OurClientType;
use Cup\SiteManagementBundle\Entity\OurClient;
use Cup\SiteManagementBundle\Dto\OurClientDto;
use Cup\SiteManagementBundle\Entity\Contact;
use Cup\SiteManagementBundle\Form\ContactType;


class ClientsController extends Controller
{
	public function clientListAction(Request $request)
	{
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
				return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		$client = $this->getDoctrine()
		->getRepository('CupSiteManagementBundle:OurClient')
		->findAll();
// 		echo var_dump($client);
		// replace this example code with whatever you need
		return $this->render('CupSiteManagementBundle:Client:client_index.html.twig', array(
				'clients' => $client
				
		));
	}

	
	public function clientAddAction(Request $request)
	{
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
		return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		$em = $this->getDoctrine()->getManager();
		$client = new OurClientDto();
		
		$form = $this->createForm(new OurClientType(), $client);
		$form->add('submit','submit', array('label' => 'Add'));
		$form ->handleRequest($request);
		 
	 if($form->isValid()) {
	 	
	 	//echo var_dump($client);

			$clientObj = new OurClient();
			$clientObj->setClientName($client->getClientName());
			$clientObj->setSubject($client->getSubject());
			$clientObj->setDescription($client->getDescription());
			$clientObj->setStoryTitle($client->getStoryTitle());
			$clientObj->setStoryDescription($client->getStoryDescription());
			
			//$clientObj->setClientImage($client->getClientImage());
			
			$uploadedfile = $client->getClientImage ();
			if (!is_null($uploadedfile)) {
				$file_name = $uploadedfile->getClientOriginalName ();
				$dir = '../../clients/';
				$uploadedfile->move ( $dir, $file_name );
				$clientObj->setClientImage( $file_name );
			}
			
			//$clientObj->setStoryImage($client->getStoryImage());
			
			$uploadedfile1 = $client->getStoryImage ();
			if (!is_null($uploadedfile1)) {
				$file_name1 = $uploadedfile1->getClientOriginalName ();
				$dir = '../../clients/';
				$uploadedfile1->move ( $dir, $file_name1 );
				$clientObj->setStoryImage( $file_name1 );
			}
				
			$clientObj->setActive($client->getActive());
			//echo var_dump($client);
				
			$em->persist($clientObj);
			 
			$em->flush();
			 
			$this->addFlash(
					'Notice',
					'ClientAdded'
			);
			Return $this->redirectToRoute('cup_site_management_campaign_client_list');
	 }
	 // replace this example code with whatever you need
	 return $this->render('CupSiteManagementBundle:Client:client_add.html.twig', array(

	 		'form' => $form->createView(),
	 ));
	}
	
	public function clientEditAction($id, Request $request)
	{
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
		return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		// replace this example code with whatever you need
	//	$ourClientDto = new OurClientDto();
		$ourClientDto = new OurClientDto();
		
		$em = $this->getDoctrine()->getManager();
		$clientObj = $em
		->getRepository('CupSiteManagementBundle:OurClient')
		->find($id);
		// 		echo var_dump($client);
						
		$ourClientDto->setSubject($clientObj->getSubject());
		$ourClientDto->setDescription($clientObj->getDescription());
		$ourClientDto->setClientName($clientObj->getClientName());
		$ourClientDto->setStoryTitle($clientObj->getStoryTitle());
		$ourClientDto->setStoryDescription($clientObj->getStoryDescription());
			
	
		$form = $this->createForm(new OurClientType(), $ourClientDto);
		$form->add('submit','submit', array('label' => 'Update'));
		$form ->handleRequest($request);
	
		if($form->isValid()) {
	 	$ourClientDto = $form->getData();
	 	/* echo var_dump($register->getClientImage());
		exit(); */
			
	 		$clientObj->setClientName($ourClientDto->getClientName());
			$clientObj->setSubject($ourClientDto->getSubject());
			$clientObj->setDescription($ourClientDto->getDescription());
			$clientObj->setStoryTitle($ourClientDto->getStoryTitle());
			$clientObj->setStoryDescription($ourClientDto->getStoryDescription());
			
			//$clientObj->setClientImage($ourClientDto->getClientImage());
			$uploadedfile = $ourClientDto->getClientImage ();
			
			if (!is_null($uploadedfile)) {
				$file_name = $uploadedfile->getClientOriginalName ();
				$dir = '../../clients/';
				$uploadedfile->move ( $dir, $file_name );
				$clientObj->setClientImage( $file_name );
			}
			
			//$clientObj->setStoryImage($ourClientDto->getStoryImage());
			
			$uploadedfile1 = $ourClientDto->getStoryImage ();
			
			if (!is_null($uploadedfile1)) {
				$file_name1 = $uploadedfile1->getClientOriginalName ();
				$dir = '../../clients/';
				$uploadedfile1->move ( $dir, $file_name1 );
				$clientObj->setStoryImage( $file_name1 );
			}
			
			$clientObj->setActive($ourClientDto->getActive());
			
				
			$em->merge($clientObj);
			 
			$em->flush();
			 
			$this->addFlash(
					'Notice',
					'ClientAdded'
			);
			Return $this->redirectToRoute('cup_site_management_campaign_client_list');
		}
		// replace this example code with  whatever you need
		return $this->render('CupSiteManagementBundle:Client:client_add.html.twig', array(
				'client' => $clientObj,
				'form' =>$form->createView()
		));
	}
	
	public function clientViewAction($id)
	{
		// replace this example code with whatever you need
		$client = $this->getDoctrine()
		->getRepository('CupSiteManagementBundle:OurClient')
		->find($id);
		// replace this example code with  whatever you need
		return $this->render('CupSiteManagementBundle:Client:client_view.html.twig', array(
				'client' => $client
		));
	
	}
	public function clientDeleteAction($id)
	{
		$client = $this->getDoctrine()
		->getRepository('CupSiteManagementBundle:OurClient')
		->find($id);
	
		$em = $this->getDoctrine()->getManager();
		$em->remove($client);
		$em->flush();
		return $this->redirect($this->generateUrl('cup_site_management_campaign_client_list'));
	}
	
	public function popUpContactAction(Request $request)
	{

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
		 
		return $this->render('CupSiteManagementBundle:Client:popupcontact.html.twig',array(
				'entity' => $entity,
				'error'=> $error,
				'form'   => $form->createView(),
				'captcha'=>$captcha,
		));
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
	
	public function removeTrailingSlashAction(Request $request)
	{
		$pathInfo = $request->getPathInfo();
		$requestUri = $request->getRequestUri();
	
		$url = str_replace($pathInfo, rtrim($pathInfo, ' /'), $requestUri);
	
		return $this->redirect($url, 301);
	}
	
	
}