<?php

namespace App\Controller;
use App\Entity\ManageUrl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
   private $entityManager;
   
   /**
     * @Route("/list", name="list")
     */
    public function index(Request $request)
    {
		
		
		$em = $this->getDoctrine();
		$urlObj = $em->getRepository("App:ManageUrl");
		$feedurls = $urlObj->findAll();
		
        return $this->render('list/index.html.twig', [
            'feedurls' => $feedurls,
        ]);
    }
}