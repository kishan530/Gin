<?php
namespace Cup\SiteManagementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cup\SiteManagementBundle\Form\GalleryCollectionType;
use Cup\SiteManagementBundle\Entity\GalleryCollection;
use Cup\SiteManagementBundle\Entity\GalleryImages;
use Cup\SiteManagementBundle\Dto\GalleryCollectionDto;
use Cup\SiteManagementBundle\Dto\GalleryImagesDto;
use Doctrine\Common\Collections\ArrayCollection;



class GalleryController extends Controller
{
	public function galleryListAction(Request $request)
	{
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
				return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		$gallery = $this->getDoctrine()
		->getRepository('CupSiteManagementBundle:GalleryCollection')
		->findAll();
		
// 		echo var_dump($client);
		// replace this example code with whatever you need
		return $this->render('CupSiteManagementBundle:GalleryCollections:galleryCollection_index.html.twig', array(
				'galleries' => $gallery
				
				
		));
	}

	
	public function galleryAddAction(Request $request)
	{
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
		return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		$em = $this->getDoctrine()->getManager();
		$gallery = new GalleryCollectionDto();
		
		$galleryImage  =new GalleryImagesDto();
		$galleryImageList = $gallery->getImageList();
		$galleryImageList->add($galleryImage);
		
		$form = $this->createForm(new GalleryCollectionType(), $gallery);
		$form->add('submit','submit', array('label' => 'Add to Gallery'));
		$form ->handleRequest($request);
		 
	 if($form->isValid()) {
	 	
	 	//echo var_dump($media);

			$galleryObj = new GalleryCollection();
			$galleryObj->setName($gallery->getName());
		
		
			$uploadedfile = $gallery->getImagePath ();
			if (!is_null($uploadedfile)) {
				$file_name = $uploadedfile->getClientOriginalName ();
				$dir = '../../GalleryCollections/';
				$uploadedfile->move ( $dir, $file_name );
				$galleryObj->setImagePath( $file_name );
			}
			
			$uploadedfile = $gallery->getBannerImage ();
			if (!is_null($uploadedfile)) {
				$file_name = $uploadedfile->getClientOriginalName ();
				$dir = '../../GalleryCollections/';
				$uploadedfile->move ( $dir, $file_name );
				$galleryObj->setBannerImage( $file_name );
			}
			
			$galleryObj->setUrl($gallery->getUrl());
			
			$galleryImageList = $gallery->getImageList();
			$galleryImages =$galleryObj->getGalleryImages();
			
			foreach($galleryImageList as $galleryImage){
			
				$galleryImageObj  =new GalleryImages();
				
				$galleryImageObj->setName($galleryImage->getName());
				
				$uploadedfile = $galleryImage->getImagePath ();
				if (!is_null($uploadedfile)) {
					$file_name = $uploadedfile->getClientOriginalName ();
					$dir = '../../GalleryCollections/';
					$uploadedfile->move ( $dir, $file_name );
					$galleryImageObj->setImagePath ($file_name );
					//$hotelRoom->setActive (1);
					$galleryImageObj->setCollectionId($galleryObj);
						
				}
				
				$galleryImages->add($galleryImageObj);
				
				
			}
			 			
			
			
			$em->persist($galleryObj);
			 
			$em->flush();
			 
			$this->addFlash(
					'Notice',
					'Gallery Collections Added'
			);
			Return $this->redirectToRoute('cup_site_management_gallery_collection_add');
	 }
	 // replace this example code with whatever you need
	 return $this->render('CupSiteManagementBundle:GalleryCollections:galleryCollection.html.twig', array(
	 		'gallery' => $gallery,
	 		'form' => $form->createView(),
	 ));
	}
	
	public function galleryEditAction($id, Request $request)
	{
		$security = $this->container->get ( 'security.context' );
		if (! $security->isGranted ( 'ROLE_SUPER_ADMIN' )) {
			return $this->redirect ( $this->generateUrl ( "cup_security_homepage" ) );
		}
		// replace this example code with whatever you need
	
		
	
		$em = $this->getDoctrine()->getManager();
		$galleryObj = $em
		->getRepository('CupSiteManagementBundle:GalleryCollection')
		->find($id);
		// 		echo var_dump($media);
	
		$galleryCollectionDto = new GalleryCollectionDto();
		$galleryCollectionDto->setName($galleryObj->getName());
		$galleryCollectionDto->setUrl($galleryObj->getUrl());
	
		$galleryImageList = $galleryCollectionDto->getImageList();
		$galleryImages =$galleryObj->getGalleryImages();
		
		
		$galleryImage  =new GalleryImagesDto();	
			//$galleryImage->setName($galleryImageObj->getName());
		$galleryImageList->add($galleryImage);
		
		$form = $this->createForm(new GalleryCollectionType(), $galleryCollectionDto);
		$form->add('submit','submit', array('label' => 'Update'));
		$form ->handleRequest($request);
	
		if($form->isValid()) {
			$galleryCollectionDto = $form->getData();
			/* echo var_dump($client->getMediaLogo());
			 exit(); */
				
			$galleryObj->setName($galleryCollectionDto->getName());
				
			//$clientObj->setClientImage($ourClientDto->getClientImage());
			$uploadedfile = $galleryCollectionDto->getImagePath ();
				
			if (!is_null($uploadedfile)) {
				$file_name = $uploadedfile->getClientOriginalName ();
				$dir = '../../GalleryCollections/';
				$uploadedfile->move ( $dir, $file_name );
				$galleryObj->setImagePath( $file_name );
			}
			
			$uploadedfile = $galleryCollectionDto->getBannerImage ();
			if (!is_null($uploadedfile)) {
				$file_name = $uploadedfile->getClientOriginalName ();
				$dir = '../../GalleryCollections/';
				$uploadedfile->move ( $dir, $file_name );
				$galleryObj->setBannerImage( $file_name );
			}
			$galleryObj->setUrl($galleryCollectionDto->getUrl());
			
			
			
			
			$galleryImageList = $galleryCollectionDto->getImageList();
			
			$galleryImages = new ArrayCollection();
				
			foreach($galleryImageList as $galleryImage){
					
				
				$uploadedfile = $galleryImage->getImagePath ();
				if (!is_null($uploadedfile)) {
					
					$galleryImageObj  =new GalleryImages();
						
					$galleryImageObj->setName($galleryImage->getName());
					
					$file_name = $uploadedfile->getClientOriginalName ();
					$dir = '../../GalleryCollections/';
					$uploadedfile->move ( $dir, $file_name );
					$galleryImageObj->setImagePath ($file_name );
					//$hotelRoom->setActive (1);
					$galleryImageObj->setCollectionId($galleryObj);
					
					$galleryImages->add($galleryImageObj);
			
				}
			
				
			
			
			}
			
			$galleryObj->setGalleryImages($galleryImages);
			
				
			$em->merge($galleryObj);
	
			$em->flush();
	
			$this->addFlash(
					'Notice',
					'Gallery Updated Added'
			);
			Return $this->redirectToRoute('cup_site_management_gallery_collection_list');
		}
		// replace this example code with  whatever you need
		return $this->render('CupSiteManagementBundle:GalleryCollections:galleryCollection.html.twig', array(
				'gallery' => $galleryObj,
				'form' =>$form->createView()
		));
	}
	public function galleryDeleteAction($id)
	{
		$gallery = $this->getDoctrine()
		->getRepository('CupSiteManagementBundle:GalleryCollection')
		->find($id);
		
		$em = $this->getDoctrine()->getManager();
		$em->remove($gallery);
		$em->flush();
		return $this->redirect($this->generateUrl('cup_site_management_gallery_collection_list'));
	}
	public function galleryImageDeleteAction($id)
	{
		$galleryImage = $this->getDoctrine()
		->getRepository('CupSiteManagementBundle:GalleryImages')
		->find($id);
	
		$em = $this->getDoctrine()->getManager();
		$em->remove($galleryImage);
		$em->flush();
		return new Response('true');
	//	return $this->redirect($this->generateUrl('cup_site_management_gallery_collection_edit'));
	}
	
	public function galleryViewAction($url)
	{
// 		$gallery = $this->getDoctrine()
// 		->getRepository('CupSiteManagementBundle:GalleryCollection')
// 		->find($id);
	
// 		$em = $this->getDoctrine()->getManager();
// 		$em->remove($gallery);
// 		$em->flush();
// 		return $this->redirect($this->generateUrl('cup_site_management_gallery_collection_view'));
// 	}
		$gallery = $this->getDoctrine()
		->getRepository('CupSiteManagementBundle:GalleryCollection')
		->findBy(array('url'=>$url));
		$gallery=$gallery[0];
		
		$galleries = $this->getDoctrine()
		->getRepository('CupSiteManagementBundle:GalleryCollection')
		->findAll();
		// replace this example code with  whatever you need
		return $this->render('CupSiteManagementBundle:GalleryCollections:view-gallery-client.html.twig', array(
				'gallery' => $gallery,
				'galleries' => $galleries
		
		
		));
	
	}
	
}