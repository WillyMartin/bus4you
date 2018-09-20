<?php
namespace Bundles\CallMeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Bundles\CallMeBundle\Entity\Trip;

class TripController extends Controller
{

    public function indexAction(Request $request)
    {
        $trip = $request->get('trip');
        $item = new Trip;

        $item->setDispatch($trip['dispatch']);
        $item->setDestination($trip['destination']);
        $item->setDateTravel(\DateTime::createFromFormat("d/m/Y", $trip['date_travel']));
        $item->setQuantityPeople($trip['quantity_people']);
        /*$item->setServices($trip['services']);*/
        $item->setName($trip['name']);
        $item->setPhone($trip['phone']);
        $item->setEmail($trip['email']);
        $item->setCreationTime(new \DateTime());


        $em = $this->getDoctrine()->getManager();
        $em->persist($item);
        $em->flush();

        $from = $this->getParameter('mailer_user');
        
        $mailBody = $this->renderView(
                'BundlesCallMeBundle:Trip:sendTrip.html.twig', array('name' => $trip['name'], 'phone' => $trip['phone'], 'email' => $trip['email'], 'dispatch' => $trip['dispatch'], 'destination' => $trip['destination'], 'date' => $trip['date_travel'], /*'services' => $trip['services'], */'quantity_people' => $trip['quantity_people'])
            );
        
        $message = \Swift_Message::newInstance()
            ->setSubject('Trip')
            ->setFrom($from)
            ->setTo('kuzhel.dima92@gmail.com')
            ->setBody($mailBody)
        ;
        $this->get('mailer')->send($message);

        $message2 = \Swift_Message::newInstance()
            ->setSubject('Trip')
            ->setFrom($from)
            ->setTo($trip['email'])
            ->setBody($mailBody)
        ;
        $this->get('mailer')->send($message2);
        
        return $this->redirectToRoute('success_trip');
    }

    public function tokenAction()
    {
        $item = new Trip;

        $form = $this->createForm('Bundles\CallMeBundle\Form\TripType', $item);

        return $this->render('BundlesCallMeBundle:CallMe:token.html.twig', ['form' => $form->createView()]);
    }
}
