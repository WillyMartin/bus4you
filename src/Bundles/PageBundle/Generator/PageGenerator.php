<?php

namespace Bundles\PageBundle\Generator;

use Bundles\PageBundle\Entity\Page;

class PageGenerator
{
    private $pm;

    public $slugs = [];
    
    private $em;
    
    public function __construct($pm)
    {
        $this->pm = $pm;
        $this->em = $pm->getContainer()
            ->get('doctrine.orm.entity_manager');
        $slugs = $this->em->getRepository(Page::class)->getSlugs();
    }
    
    public function generate()
    {
        foreach ($this->pm->entities as $key => $entity) {
            $repo = $this->em->getRepository($entity);
            $items = $repo->findByPage(null);
            
            if (null === $items) {
                continue;               
            }
            
            foreach ($items as $item) {
                $this->slugs[] = $this->pm->createPage($item, false, $this->slugs);
            }
        }
        
        $this->em->flush();
        
    }
}