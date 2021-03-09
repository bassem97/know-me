<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RoomType;
use App\Entity\Room;

use App\Repository\RoomRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RoomController extends AbstractController
{
    /**
     * @Route("/room", name="room")
     */
    public function index(): Response
    {
        return $this->render('room/index.html.twig', [
            'controller_name' => 'RoomController',
        ]);
    }


    
    /**
     * @param RoomRepository $repository
     * @Route ("/afficheRoom", name="afficheRoom")
     */

    function afficher(RoomRepository $repository){
        $room = $repository->findAll();
        return $this->render('room/afficherRoom.html.twig', ['room'=> $room]);
    }


    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return Response
     * @Route("room/add", name="addRoom")
     */

    function AddRoom(Request $request)
    {
        $room = new Room();
        $form = $this->createForm(RoomType::class, $room);
        $form->add('Ajouter', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($room);
            $em->flush();
            return $this->redirectToRoute("afficheRoom");
            $this->addFlash('success', 'room ajoutée!');
        }
        return $this->render('room/AddRoom.html.twig', [
            'form' => $form->createView()
        ]);

    }

    //done



    /**
     * @param $id
     * @param RoomRepository $repository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("/deleteRoom/{id}", name="deleteRoom")
     */
    public function deleteRoom($id, RoomRepository $repository){
        $room=$repository->find($id);
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($room);
        $entityManager->flush();
        return $this->redirectToRoute("afficheRoom");
    }


    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @Route ("room/update/{id}", name="updateRoom")
     */

    function update($id, RoomRepository $repository,Request $request){
        $room=$repository->find($id);
        $form=$this->createForm(RoomType::class, $room);
        $form->add('update', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("afficheRoom");
        }
        return $this->render('room/UpdateRoom.html.twig', [
            'update_form'=>$form->createView()
        ]);
    }
    
}
