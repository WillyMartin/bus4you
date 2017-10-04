<?php

namespace Bundles\ParameterBundle\Service;

use Doctrine\ORM\EntityRepository;

class ParameterManager
{
    private $repo;
    
    public function __construct(EntityRepository $repo) {
        $this->repo = $repo;
    }
    
    public function getParameter($slug)
    {
        return $this->repo->findOneBySlug($slug);
    }
    
    public function get($slug)
    {
        $param = $this->repo->findOneBySlug($slug);
        if ($param) {
            $param->getValue();
        }
    }
}