<?php

namespace Bundles\PageBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;

class PageableAdmin extends Admin
{
    public function savePage($item, $save = false)
    {
        $pm = $this->getConfigurationPool()->getContainer()->get('bundles.page.page_manager');
        $page = $item->getPage();
        $pm->savePage($item, $page);
        if($save) {
            $pm->flush();
        }
    }
    
    public function makeSlug($item)
    {
        $pm = $this->getConfigurationPool()->getContainer()->get('bundles.page.page_manager');
        $pm->makeSlug($item);
    }
    
    public function prePersist($item)
    {
        $this->makeSlug($item);
    }
    
    public function postPersist($item)
    {
        $this->savePage($item, true);
    }
    
    public function preUpdate($item)
    {    
        $this->makeSlug($item);
        $this->savePage($item);
    }
}