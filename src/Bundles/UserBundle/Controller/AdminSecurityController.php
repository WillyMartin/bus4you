<?php

namespace Bundles\UserBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as Controller;

class AdminSecurityController extends Controller
{
    protected function renderLogin(array $data)
    {
        return $this->render('BundlesUserBundle:Security:login.html.twig', $data);
    }
}
