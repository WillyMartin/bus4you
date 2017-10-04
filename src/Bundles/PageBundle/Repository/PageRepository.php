<?php

namespace Bundles\PageBundle\Repository;

class PageRepository extends \Doctrine\ORM\EntityRepository
{
	public function getSlugs() {
		return $this->createQueryBuilder('p')->select('p.slug')->getQuery()->getResult();
	}
}
