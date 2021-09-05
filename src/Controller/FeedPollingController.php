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

	// echo "<pre>";
 //    print_r($id);
 //    die;
        $em = $this->getDoctrine();
        $urlObj = $em->getRepository("App:ManageUrl");
        $feedurls = $urlObj->find($id);
        
        $url = $feedurls->getUrl();
        // die($url);



        // $product = $this->getDoctrine()
        //     ->getRepository(Product::class)
        //     ->find($id);




		
		// $feedurls = [
  //           '1' => 'https://www.axelerant.com/tag/drupal-planet/feed',
  //           '2' => 'http://feeds.bbci.co.uk/news/technology/rss.xml',
  //           '3' => 'https://feeds.feedburner.com/symfony/blog',
            
  //       ];
        
		// $url=$feedurls[$id];
		
		$rss = simplexml_load_file($url);
		// echo "<pre>";
  //       print_r($rss->channel->item[0]['title']);
  //       die;

        return $this->render('feed_polling/feeds.html.twig', [
            'rss' => $rss,
        ]);
    }
	
	
}
