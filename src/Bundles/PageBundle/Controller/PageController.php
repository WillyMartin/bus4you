<?php

namespace Bundles\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function metaDataAction()
    {
        return $this->render('BundlesPageBundle:Default:index.html.twig', array('name' => $name));
    }
}
