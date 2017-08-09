<?php
namespace Cup\SiteManagementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cup\SiteManagementBundle\Form\OurMediaType;
use Cup\SiteManagementBundle\Entity\OurMedia;
use Cup\SiteManagementBundle\Dto\OurMediaDto;



class MediaController extends Controller
{
	public function mediaListAction(Request $request)
	{
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
				return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		$media = $this->getDoctrine()
		->getRepository('CupSiteManagementBundle:OurMedia')
		->findAll();
// 		echo var_dump($client);
		// replace this example code with whatever you need
		return $this->render('CupSiteManagementBundle:Media:media_index.html.twig', array(
				'medias' => $media
				
		));
	}

	
	public function mediaAddAction(Request $request)
	{
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
		return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		$em = $this->getDoctrine()->getManager();
		$media = new OurMediaDto();
		
		$form = $this->createForm(new OurMediaType(), $media);
		$form->add('submit','submit', array('label' => 'Add Media'));
		$form ->handleRequest($request);
		 
	 if($form->isValid()) {
	 	
	 	//echo var_dump($media);

			$mediaObj = new OurMedia();
			$mediaObj->setMediaName($media->getMediaName());
			$mediaObj->setNewsSubject($media->getNewsSubject());
			$mediaObj->setNewsDescription($media->getNewsDescription());
			$mediaObj->setNewsTitle($media->getNewsTitle());
			$mediaObj->setNewsLink($media->getNewsLink());
		
			$uploadedfile = $media->getMediaLogo ();
			if (!is_null($uploadedfile)) {
				$file_name = $uploadedfile->getClientOriginalName ();
				$dir = '../../medias/';
				$uploadedfile->move ( $dir, $file_name );
				$mediaObj->setMediaLogo( $file_name );
			}
			
			$em->persist($mediaObj);
			 
			$em->flush();
			 
			$this->addFlash(
					'Notice',
					'Media Added'
			);
			Return $this->redirectToRoute('cup_site_management_media_list');
	 }
	 // replace this example code with whatever you need
	 return $this->render('CupSiteManagementBundle:Media:media_add.html.twig', array(

	 		'form' => $form->createView(),
	 ));
	}
	
	public function mediaEditAction($id, Request $request)
	{
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
		return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		// replace this example code with whatever you need
	
		$ourMediaDto = new OurMediaDto();
		
		$em = $this->getDoctrine()->getManager();
		$mediaObj = $em
		->getRepository('CupSiteManagementBundle:OurMedia')
		->find($id);
		// 		echo var_dump($media);
						
		$ourMediaDto->setMediaName($mediaObj->getMediaName());
		$ourMediaDto->setNewsSubject($mediaObj->getNewsSubject());
		$ourMediaDto->setNewsDescription($mediaObj->getNewsDescription());
		$ourMediaDto->setNewsTitle($mediaObj->getNewsTitle());
		$ourMediaDto->setNewsLink($mediaObj->getNewsLink());
		
		$form = $this->createForm(new OurMediaType(), $ourMediaDto);
		$form->add('submit','submit', array('label' => 'Update'));
		$form ->handleRequest($request);
	
		if($form->isValid()) {
	 	$ourMediaDto = $form->getData();
	 	/* echo var_dump($client->getMediaLogo());
		exit(); */
			
	 		$mediaObj->setMediaName($ourMediaDto->getMediaName());
			$mediaObj->setNewsSubject($ourMediaDto->getNewsSubject());
			$mediaObj->setNewsDescription($ourMediaDto->getNewsDescription());
			$mediaObj->setNewsTitle($ourMediaDto->getNewsTitle());
			$mediaObj->setNewsLink($ourMediaDto->getNewsLink());
			
			//$clientObj->setClientImage($ourClientDto->getClientImage());
			$uploadedfile = $ourMediaDto->getMediaLogo ();
			
			if (!is_null($uploadedfile)) {
				$file_name = $uploadedfile->getClientOriginalName ();
				$dir = '../../medias/';
				$uploadedfile->move ( $dir, $file_name );
				$mediaObj->setMediaLogo( $file_name );
			}
			
			$em->merge($mediaObj);
			 
			$em->flush();
			 
			$this->addFlash(
					'Notice',
					'Media Added'
			);
			Return $this->redirectToRoute('cup_site_management_media_list');
		}
		// replace this example code with  whatever you need
		return $this->render('CupSiteManagementBundle:Media:media_add.html.twig', array(
				'media' => $mediaObj,
				'form' =>$form->createView()
		));
	}
	
	public function galleryDeleteAction($id)
	{
		$media = $this->getDoctrine()
		->getRepository('CupSiteManagementBundle:OurMedia')
		->find($id);
	
		$em = $this->getDoctrine()->getManager();
		$em->remove($media);
		$em->flush();
		return $this->redirect($this->generateUrl('cup_site_management_media_list'));
	}
	
}