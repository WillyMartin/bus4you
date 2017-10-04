<?php

namespace Bundles\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    public function searchByCategoryAction()
    {
        $menuRepo = $this->container->get('bundles.page.menu.repository');
        $items = $menuRepo->findBy([],['orderNum' => 'ASC']);
        
        return $this->render('BundlesPageBundle:Menu:searchByCategory.html.twig', compact('items'));
    }
}
