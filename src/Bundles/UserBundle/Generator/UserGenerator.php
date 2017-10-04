<?php

namespace Bundles\UserBundle\Generator;

use Bundles\PageBundle\Entity\Page;
use Bundles\StoreBundle\Entity\Customer;

class UserGenerator
{
    const DEFAULT_PASSWORD = '12345';
    
    private $um;
    private $em;
    
    public function __construct($container) {
        $this->container = $container;
        $this->um = $container->get('fos_user.user_manager');
    }
    
    public function generate()
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $customers = $em->getRepository(Customer::class)->findAll();
        
        $data = [];
        $iterator = 0;
        foreach ($customers as $customer) {

            if ($customer->getUser() || !$customer->getEmail()){
                continue;               
            }

            if (in_array(strtolower($customer->getEmail()), $data)){
                continue;               
            }
            $data[] =  strtolower($customer->getEmail());
            
            $user = $this->um->createUser();
            $user->setEnabled(true);
            $user->setEmail($customer->getEmail());
            $user->setCustomer($customer);
            $customer->setUser($user);
            
            if ($customer->getPassword()) {
                $user->setPlainPassword($customer->getPassword());
            } else {
                $user->setPlainPassword(self::DEFAULT_PASSWORD);
            }
            $this->um->updateCanonicalFields($user);
            $this->um->updatePassword($user);
            $em->persist($user);     
            $iterator++;
            
            if ($iterator > 50) {
                $iterator = 0;
                $em->flush();
            }
        }
        
        $em->flush();
        
    }
}