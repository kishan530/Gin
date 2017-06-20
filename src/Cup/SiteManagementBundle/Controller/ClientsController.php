<?php
namespace Cup\SiteManagementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cup\SiteManagementBundle\Form\OurClientType;
use Cup\SiteManagementBundle\Entity\OurClient;
use Cup\SiteManagementBundle\Dto\OurClientDto;


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
		return $this->render('CupSiteManagementBundle:Client:client_edit.html.twig', array(
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
}