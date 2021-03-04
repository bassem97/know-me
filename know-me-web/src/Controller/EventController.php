<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class EventController extends AbstractController
{
    /**
     * @Route("/event", name="event")
     */
    public function index(): Response
    {
        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
        ]);
    }
    /**
     * @param EventRepository $repository
     * @Route ("/AfficherEvent", name="event-class")
     */

    function afficher(EventRepository $repository)
    {
        $event = $repository->findAll();
        return $this->render('event/AfficheEvents.html.twig', ['event' => $event]);
    }
    /**
     * @Route("/gerant/AddEvent", name="add-event")
     */
    function AddEvent(Request $request)
    {
        $event = new event();
        $form = $this->createForm(EventType::class, $event);
        $form->add('Ajouter', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file=$event->getImage();
            $fileName=md5(uniqid()).".".$file->guessExtension();
            $event->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            $this->addFlash('success', 'Event ajoutée!');
        }
        return $this->render('event/AddEvent.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/gerant/DeleteEvent/{id}", name="delete-event")
     */ function DeleteEvent($id, EventRepository $rep)
    {
        $event = $rep->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute("event-class");

    }
}
