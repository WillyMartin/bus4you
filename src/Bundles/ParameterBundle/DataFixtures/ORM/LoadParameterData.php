<?php

namespace Bundles\ParameterBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Bundles\ParameterBundle\Entity\Parameter;

class LoadParameterData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $this->create('email', 'email', 'example@gmail.com' ,$manager);
        $this->create('skype', 'Skype', 'MySkype' ,$manager);
        $this->create('phone', 'Телефон', '8 (495) 961-06-18' ,$manager);
        $this->create('opt_phone', 'Телефон(опт.)', ' 8 (495) 961-44-64' ,$manager);
        
        $manager->flush();
    }
    
    private function create($slug, $name, $data , $manager)
    {
        $param = new Parameter();
        $param->setSlug($slug);
        $param->setName($name);
        $param->setValue($data);
        $manager->persist($param);
    }
}