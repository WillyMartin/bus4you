<?php

namespace Bundles\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bundles\PageBundle\Entity\StaticPage;

class StaticPageController extends Controller
{
    public function staticPageAction($slug) 
    {
        $res = ['last' => null];
        $res['page'] = $this->get('bundles.page.page_manager')->getItemBySlug($slug, 'Bundles\PageBundle\Entity\StaticPage');
         
        return $this->render('BundlesPageBundle:StaticPage:static.html.twig', $res); 

    }
}
