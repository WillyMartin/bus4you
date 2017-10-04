<?php

namespace Bundles\PageBundle\Service;

use Bundles\PageBundle\Entity\Page;
use Bundles\PageBundle\Entity\StaticPage;
use Bundles\PageBundle\Entity\Article;
use Bundles\StoreBundle\Entity\Product;
use Bundles\StoreBundle\Entity\Category;
use Bundles\StoreBundle\Entity\Gallery;


class PageManager
{
    private $container;
    
    public $entities = [
        'Bundles\PageBundle\Entity\StaticPage',
        'Bundles\PageBundle\Entity\Article',
        'Bundles\StoreBundle\Entity\Product',
        'Bundles\StoreBundle\Entity\Category',
    ];
    
    public function __construct($container) {
        $this->container = $container;
    }

    public function getItemBySlug($slug, $entity, $setMeta = true)
    {        
        $em = $this->container->get('doctrine.orm.entity_manager');
        
        $pageRepo = $em->getRepository('Bundles\PageBundle\Entity\Page');
        
        $page = $pageRepo->findOneBySlug($slug);
        
        if ($page === null) throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

        if ($setMeta) {
            $this->setSeoData($page);
        }
        
        
        $itemRepo = $em->getRepository($entity);
        
        return $itemRepo->find($page->getItemId());
    }
    
    public function setSeoData($page)
    {
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($page->getTitle())
            ->addMeta('name', 'description', $page->getDescription())
            ->addMeta('name', 'keywords', $page->getKeywords())
        ;
    }
    
    public function createPage($item , $flush = true, $existSlugs = [])
    {
        $page = new Page;
        $item->setPage($page);
        $page->generateSlug([$item->getName()]);

        if (in_array($page->getSlug(), $existSlugs)) {

            $page->setSlug($page->getSlug() . uniqid());

        }


        $this->savePage($item, $page);
        if ($flush) {
            $this->flush();
        }

        return $page->getSlug();
    }

    public function savePage($item, $page)
    {
        $page->setItemId($item->getId());
        $page->setEntityId($this->getEntityId($item));

    }
    
    public function getEntityId($item)
    {
        $class = str_replace('Proxies\__CG__\\', '', get_class($item));
        return array_search($class, $this->entities);
    }
    
    public function makeSlug($item)
    {
        $page = $item->getPage();
        $page->generateSlug([$item->getName()]);
    }
    
    public function flush()
    {
        $this->container->get('doctrine.orm.entity_manager')->flush();
    }
    
    public function getContainer()
    {
        return $this->container;
    }
}