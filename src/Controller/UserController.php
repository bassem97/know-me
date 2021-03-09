<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

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
        $users = $repository->findAll();
        return $this->render('event/participants.html.twig', ['users'=> $users]);
    }

}
