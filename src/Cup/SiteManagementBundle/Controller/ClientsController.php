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
		$em = $this->getDoctrine()->getManager();
		$client = new OurClient();
		
		$form = $this->createForm(new OurClientType(), $client);
		$form->add('submit','submit', array('label' => 'Add'));
		$form ->handleRequest($request);
		 
	 if($form->isValid()) {
	 	$register = $form->getData();
	 	echo var_dump($client);

			$clientObj = new OurClient();
			$clientObj->setClientImage($client->getClientImage());
			$clientObj->setSubject($client->getSubject());
			$clientObj->setDescription($client->getDescription());
			$clientObj->setClientName($client->getClientName());
			
				
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
		// replace this example code with whatever you need
	//	$ourClientDto = new OurClientDto();
		$clientObj = new OurClient();
		$clientObj = $this->getDoctrine()
		->getRepository('CupSiteManagementBundle:OurClient')
		->find($id);
// 		echo var_dump($client);
	
		/* $client->setClientImage($client->getClientImage());
		$client->setSubject($client->getSubject());
		$client->setDescription($client->getDescription());
		$client->setClientName($client->getClientName()); */
		
	
		$em = $this->getDoctrine()->getManager();
	
		$form = $this->createForm(new OurClientType(), $clientObj);
		$form->add('submit','submit', array('label' => 'Upadate'));
		$form ->handleRequest($request);
	
		if($form->isValid()) {
	 	$ourClientDto = $form->getData();
	 	/* echo var_dump($register->getClientImage());
		exit(); */
			
			$clientObj->setClientImage($ourClientDto->getClientImage());
			$clientObj->setSubject($ourClientDto->getSubject());
			$clientObj->setDescription($ourClientDto->getDescription());
			$clientObj->setClientName($ourClientDto->getClientName());
			
				
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
		return $this->redirect($this->generateUrl('cup_site_management_campaign_client_delete'));
	}
}