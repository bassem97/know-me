<?php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @param UserRepository $repository
     * @Route ("/afficheUser", name="afficheUser")
     */

    function afficher(UserRepository $repository){
        $user = $repository->findAll();
        return $this->render('user/afficherUser.html.twig', ['user'=> $user]);
    }


    /**
     * @return \Symfony\Component\HttpFoundation\Resquest
     * @Route("user/add")
     */

    function addUser(Request $request){
        $user = new User();
        $form = $this->createForm(UserType::class);
        $form->add('Ajouter', submitType::class);
        $form->handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()){
            $em = $this->getDoctrine()->getManager();
            $em ->persist($user);
            $em-> flush();
            return $this->redirectToRoute("afficheUser");
        }
        return $this->render('user/addUser.html.twig', ['form' => $form->createView()]);
    }

}
