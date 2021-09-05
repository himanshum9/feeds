<?php

namespace App\Controller;
use App\Entity\ManageUrl;
use App\Form\UrlType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ManageUrlController extends AbstractController
{
    #[Route('/manage/url', name: 'manage_url')]

    /**
     * @Route("/manage/url", name="manage_url")
     */
    public function index(): Response
    {
       
	   
	   return $this->render('manage_url/index.html.twig', [
            'controller_name' => 'ManageUrlController',
        ]);
    }
	
	 /**
     * @Route("/add/url", name="add_url")
     */
	#[Route('/add/url', name: 'add_url')]
    public function addUrl(Request $request): Response
    {
        $mgurl = new ManageUrl();

       
	   $form = $this->createForm(UrlType::class,$mgurl);
	    $form->handleRequest($request);
	   if ($form->isSubmitted() && $form->isValid()) {
            
            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($mgurl);
            $em->flush();
			$this->addFlash("message","Url save successfully");
            return $this->redirectToRoute('list');
        }
	   
	   return $this->render('manage_url/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
	
	/**
     * @Route("/edit/url/id/{id}", name="edit_url")
     */
	#[Route('/edit/url/id/{id}', name: 'edit_url')]
    public function editUrl(Request $request,$id): Response
    {
        $em = $this->getDoctrine();
		$urlObj = $em->getRepository("App:ManageUrl");
		$feedurl = $urlObj->find($id);
		$feedurl->setUrl($feedurl->getUrl());
		$mgurl = new ManageUrl();
	   $form =$this->createFormBuilder($feedurl);
	   $form = $this->createForm(UrlType::class,$feedurl);
	   $form->handleRequest($request);
	   if ($form->isSubmitted() && $form->isValid()) {
           
            // Save
           $em = $this->getDoctrine()->getManager();
            $feedurlobj=$em->getRepository("App:ManageUrl")->find($id);
			
			$feedurlobj->setUrl($form['url']->getData());
            $em->flush();
			$this->addFlash("message","Url updated successfully");
            return $this->redirectToRoute('list');
        }
	   return $this->render('manage_url/edit.html.twig', [
            'form' => $form->createView(),'feedurl'=>$feedurl,]);
		
    }
	
	/**
     * @Route("/delete/url/id/{id}", name="delete_url")
     */
	#[Route('/delete/url/id/{id}', name: 'delete_url')]
    public function deleteUrl(Request $request,$id): Response
    {
        
           $em = $this->getDoctrine()->getManager();
            $feedurlobj=$em->getRepository("App:ManageUrl")->find($id);
			$em->remove($feedurlobj);
            $em->flush();
			$this->addFlash("message","Url deleted successfully");
            return $this->redirectToRoute('list');
        
    }
	
	
}
