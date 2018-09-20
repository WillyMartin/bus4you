<?php

namespace Bundles\CallMeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Bundles\CallMeBundle\Entity\CallMe;

class CallMeController extends Controller
{
    public function indexAction(Request $request)
    {
        
//        $item = new CallMe;
//
//        $form = $this->createForm('Bundles\CallMeBundle\Form\CallMeType', $item);
//
//        $form->handleRequest($request);
//        if ($form->isValid()) {
//
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($item);
//            $em->flush();
//
//            $this->get('mail_service')->mailByCall($item);
//
////            $mm = $this->get('bundles.store.email_manager');
////            $mm->sendMailByFeedback($item);
//
//            return $this->redirectToRoute('register_success');
//        }
//
//        return $this->redirect($request->server->get('HTTP_REFERER'));



        $call = $request->get('call_me');
        $item = new CallMe;

        $item->setName($call['name']);
        $item->setPhone($call['phone']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($item);
        $em->flush();


        $message = \Swift_Message::newInstance()
            ->setSubject('Call')
            ->setFrom($this->getParameter('mailer_user'))
            ->setTo('kuzhel.dima92@gmail.com')
            ->setBody(
            $this->renderView(
                'BundlesCallMeBundle:CallMe:sendCall.html.twig', array('name' => $call['name'], 'phone' => $call['phone'])
            )
            )
        ;
        $this->get('mailer')->send($message);

        return $this->redirectToRoute('success_call');
    }
    
    public function tokenAction()
    {
        $item = new CallMe;

        $form = $this->createForm('Bundles\CallMeBundle\Form\CallMeType', $item);
          
        return $this->render('BundlesCallMeBundle:CallMe:token.html.twig', ['form' => $form->createView()]);
    }

}
