<?php

namespace Bundles\CallMeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Bundles\CallMeBundle\Form\CallMeType;
use Bundles\CallMeBundle\Entity\Letter;

class LetterController extends Controller
{
    public function indexAction(Request $request)
    {
        $item = new Letter;

        $form = $this->createForm('Bundles\CallMeBundle\Form\LetterType', $item);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $item->loadClientData();
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            $mm = $this->get('bundles.store.email_manager');
            $mm->sendMailByLetter($item);
            
            return new JsonResponse();
        }
    
        return new JsonResponse();
    }
    
    public function tokenAction()
    {
        $item = new Letter;

        $form = $this->createForm('Bundles\CallMeBundle\Form\LetterType', $item);
          
        return $this->render('BundlesCallMeBundle:CallMe:token.html.twig', ['form' => $form->createView()]);
    }
    
    public function subjectAction()
    {
        $em = $this->getDoctrine()->getManager();
        $subjects = $em->getRepository('BundlesCallMeBundle:Subject')->findAll();
          
        return $this->render('BundlesCallMeBundle:CallMe:subject.html.twig', compact('subjects'));
    }
}
