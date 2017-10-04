<?php

namespace Bundles\UserBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as Controller;

class SecurityController extends Controller
{
    protected function renderLogin(array $data)
    {
        return $this->render('default/login.html.twig', $data);
    }
}
