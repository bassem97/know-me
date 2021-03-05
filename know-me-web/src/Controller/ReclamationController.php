<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Reclamation;
use App\Form\ReclamationFormType;

class ReclamationController extends AbstractController
{
           /**
     * @param AdminRepository $repository
     * @Route ("/Reclamation", name="Reclamation")
     */

    public function afficher()
    {
        $reclamations = $this->getDoctrine()->getRepository(Reclamation::class)->findAll();
    
        return $this->render('reclamation/Reclamation.html.twig', [
            "reclamations" => $reclamations,
        ]);
    }
          /**
     * @return \Symfony\Component\HttpFoundation\Resquest
     * @Route("/createReclamation")
     */
    function addReclamation(Request $request) : Response {
        $reclamation = new Reclamation();
        

        $form = $this->createForm(ReclamationFormType::class,$reclamation);
        $form->add('Ajouter',submitType::class);
        $form->handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()){
            $em = $this->getDoctrine()->getManager();
            $em ->persist($reclamation);
            $reclamation->setCreatedAt(new \DateTime('now'));
            $em-> flush();
            return $this->redirectToRoute("Reclamation");
        }
        return $this->render('reclamation/createReclamation.html.twig', ['form' => $form->createView()]);
    }
    
        /**
     *
     * 
     * 
     * @Route ("/deleteReclamation/{id}", name="deleteReclamation")
     */
    public function supprimerReclamation(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $reclamation = $entityManager->getRepository(Reclamation::class)->find($id);
        $entityManager->remove($reclamation);
        $entityManager->flush();
        return $this->redirectToRoute("Reclamation");
    }

         /**
     *
     * @Route ("updateReclamation/{id}", name="updateReclamation")
     */

    public function updateReclamation(Request $request, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
    
        $reclamation = $entityManager->getRepository(Reclamation::class)->find($id);
        $form = $this->createForm(ReclamationFormType::class, $reclamation);
        $form->add('update', SubmitType::class);
        $form->handleRequest($request);
    
        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->flush();
            return $this->redirectToRoute("Reclamation");
        }
        return $this->render('reclamation/createReclamation.html.twig', [
            'form'=>$form->createView()
        ]);
    }
    
/**
     * @Route("/reclamation", name="reclamation")
     */
    public function index(): Response
    {
        return $this->render('reclamation/index.html.twig', [
            'controller_name' => 'ReclamationController',
        ]);
    }
}
