<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\User;
use App\Form\EventType;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(): Response
    {
        return $this->render('login/login.html.twig', [
            'controller_name' => 'LoginController',
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
            $file = $event->getImage();
            $fileName = md5(uniqid()) . "." . $file->guessExtension();

            try {
                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                $e->getMessage();
            }
            $event->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            $this->addFlash('success', 'Event ajoutée!');
            return $this->redirectToRoute('event-class');
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
        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute("event-class");
    }
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @Route ("gerant/updateEvent/{id}", name="update")
     */
    function update($id, EventRepository $repository, Request $request)
    {
        $event = $repository->find($id);
        $form = $this->createForm(EventType::class, $event);
        $form->add('update', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $file = $event->getImage();
            $fileName = md5(uniqid()) . "." . $file->guessExtension();
            if ($file) {
                try {
                    $file->move(
                        $this->getParameter('images_directory'),
                        $fileName
                    );
                } catch (FileException $e) {
                    $e->getMessage();
                }
            }
            $event->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute("event-class");
        }
        return $this->render('event/UpdateEvent.html.twig', [
            'update_form' => $form->createView()
        ]);
    }
    /**
     * @Route("/AfficherEvent/{id}", name="participate")
     */
    function ParticipateToEvent($id, Request $request, EventRepository $repository)
    {
        $em = $this->getDoctrine()->getManager();
        
        $event = $repository->find($id);
        $user = new User();
        $user->setEmail("ska@test.com");
        $user->setFname("skander");
        $user->setLName("kahouli");
        $user->setPhoto("test");
        $user->setPwd("test");
        $user->setLocation("test");

        $user->AddEvent($event);
        $em->persist($user);
        $em->persist($event);
        $em->flush();
        return $this->render('event/participants.html.twig', ['user' => $user]);

    }
}
