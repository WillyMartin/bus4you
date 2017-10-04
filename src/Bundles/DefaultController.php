<?php

namespace CS\SitemapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

class DefaultController extends Controller
{
    /**
     * @Cache(expires="+1 hours", public=true)
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $render = $this->render('CSSitemapBundle:Default:index.xml.twig', array());
        $render->headers->set('Content-Type', 'text/xml');

        return $render;
    }

    /**
     * 
     * @Cache(expires="+1 hours", public=true)
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function htmlAction()
    {
        $categories = $this->getDoctrine()->getRepository('CSTaxonomyBundle:Category')->findBy(array('enabled' => true, 'lvl' => array(1, 2, 3, 4)), array('lft' => 'ASC'));

        //print count($categories);

        return $this->render('CSSitemapBundle:Default:html.html.twig', array(
            'categories'    => $categories,
        ));
    }
}
