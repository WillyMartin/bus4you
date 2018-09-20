<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }
    
    /**
     * @Route("/success", name="success_trip")
     */
    public function successTripAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/successTrip.html.twig');
    }
    
    /**
     * @Route("/success-call", name="success_call")
     */
    public function successCallAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/successCall.html.twig');
    }
}
