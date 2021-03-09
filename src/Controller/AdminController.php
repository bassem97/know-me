<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\AdminRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Admin;
use App\Form\AdminFormType;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
        /**
     * @param AdminRepository $repository
     * @Route ("/Admin", name="afficheAdmin")
     */

    public function afficher()
    {
        $admins = $this->getDoctrine()->getRepository(Admin::class)->findAll();
    
        return $this->render('admin/Admin.html.twig', [
            "admins" => $admins,
        ]);
    }

        /**
     * @return \Symfony\Component\HttpFoundation\Resquest
     * @Route("/createAdmin")
     */

    function addAdmin(Request $request) : Response {
        $admin = new Admin();
        $form = $this->createForm(AdminFormType::class,$admin);
        $form->add('Ajouter',submitType::class);
        $form->handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()){
            $em = $this->getDoctrine()->getManager();
            $em ->persist($admin);
            $em-> flush();
            return $this->redirectToRoute("afficheAdmin");
        }
        return $this->render('admin/createAdmin.html.twig', ['form' => $form->createView()]);
    }

        /**
     *
     * 
     * 
     * @Route ("/deleteAdmin/{id}", name="deleteAdmin")
     */
    public function supprimerAdmin(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $admin = $entityManager->getRepository(Admin::class)->find($id);
        $entityManager->remove($admin);
        $entityManager->flush();
        return $this->redirectToRoute("afficheAdmin");
    }

        /**
     *
     * @Route ("updateAdmin/{id}", name="updateAdmin")
     */

    public function updateAdmin(Request $request, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
    
        $admin = $entityManager->getRepository(Admin::class)->find($id);
        $form = $this->createForm(AdminFormType::class, $admin);
        $form->add('update', SubmitType::class);
        $form->handleRequest($request);
    
        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->flush();
            return $this->redirectToRoute("afficheAdmin");
        }
        return $this->render('admin/createAdmin.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
