<?php

namespace Bundles\PageBundle\Model;

trait Pageable
{
    protected $page;

    public function getPage()
    {
        return $this->page;
    }

    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }
}