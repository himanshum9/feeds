<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class FeedPollingController extends AbstractController
{
    #[Route('/feed/polling', name: 'feed_polling')]
    /**
     * @Route("/feed/polling", name="feed_polling")
     */
    public function index(): Response
    {
        return $this->render('feed_polling/index.html.twig', [
            'controller_name' => 'FeedPollingController',
        ]);
    }
	
    /**
     * @Route("/url/feeds/id/{id}", name="url_feeds")
     */
	#[Route('/url/feeds/id/{id}', name: 'url_feeds')]
    public function urlFeeds(Request $request,$id): Response
    {

        $em = $this->getDoctrine();
        $urlObj = $em->getRepository("App:ManageUrl");
        $feedurls = $urlObj->find($id);
        
        $url = $feedurls->getUrl();
		$rss = simplexml_load_file($url);
		

        return $this->render('feed_polling/feeds.html.twig', [
            'rss' => $rss,
        ]);
    }
	
	
}
