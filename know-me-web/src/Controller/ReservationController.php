<?php

namespace App\Controller;

use App\Form\ReservationFormType;
use App\Entity\Reservation;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReservationController extends AbstractController
{
    /**
     * @Route("/Reservation", name="Reservation")
     */
    public function index(): Response
    {
        return $this->render('Reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }

    /**
     * @param ReservationRepository $repository
     * @Route ("/afficheReservation", name="afficheReservation")
     */

    function afficher(ReservationRepository $repository){
        $Reservation = $repository->findAll();
        return $this->render('Reservation/afficherReservation.html.twig', ['Reservation'=> $Reservation]);
    }


    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return Response
     * @Route("Reservation/add")
     */

    function addReservation(Request $request){
        $Reservation = new Reservation();
        $form = $this->createForm(ReservationFormType::class, $Reservation);
        $form->add('Ajouter', submitType::class);
        $form->handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()){
  
            $em = $this->getDoctrine()->getManager();
            $em->persist($Reservation);
            $em->flush();
            return $this->redirectToRoute("afficheReservation");



        }
        return $this->render('Reservation/addReservation.html.twig', ['form' => $form->createView()]);
    }



    /**
     * @param $id
     * @param ReservationRepository $repository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("/Supp/{id}", name="d")
     */
    public function supprimerC($id, ReservationRepository $repository){
        $Reservation=$repository->find($id);
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($Reservation);
        $entityManager->flush();
        return $this->redirectToRoute("afficheReservation");
    }


    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @Route ("Reservation/update/{id}", name="update")
     */

    function update($id, ReservationRepository $repository,Request $request){
        $Reservation=$repository->find($id);
        $form=$this->createForm(ReservationFormType::class, $Reservation);
        $form->add('update', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("afficheReservation");
        }
        return $this->render('Reservation/Update.html.twig', [
            'update_form'=>$form->createView()
        ]);
    }



}