<?php

namespace Bundles\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bundles\PageBundle\Entity\Article;

class ArticleController extends Controller
{
    public function indexAction() 
    {
        $em = $this->getDoctrine()->getManager();
        
        $articles = $em->getRepository('Bundles\PageBundle\Entity\Article')->findAll();
        
        return $this->render('BundlesPageBundle:Article:index.html.twig', compact('articles')); 

    }
    
    public function articleAction($slug) 
    {
        $page = $this->get('bundles.page.page_manager')->getItemBySlug($slug,'Bundles\PageBundle\Entity\Article');
        
        return $this->render('BundlesPageBundle:Article:article.html.twig', compact('page')); 

    }
}
