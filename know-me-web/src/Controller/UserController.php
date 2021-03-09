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
use Symfony\Component\HttpFoundation\File\Exception\FileException;
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
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return Response
     * @Route("user/add")
     */

    function addUser(Request $request){
        $user = new user();
        $form = $this->createForm(UserType::class, $user);
        $form->add('Ajouter', submitType::class);
        $form->handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()){

            $file=$user->getPhoto();
            $fileName=md5(uniqid()).".". $file->guessExtension();

            try {
                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                $e->getMessage();
            }
            $user->setPhoto($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash('notice','Photo ajoutée!');
            return $this->redirectToRoute("afficheUser");



        }
        return $this->render('user/addUser.html.twig', ['form' => $form->createView()]);
    } 



    /**
     * @param $id
     * @param UserRepository $repository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("/Supp/{id}", name="d")
     */
    public function supprimerC($id, UserRepository $repository){
        $user=$repository->find($id);
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();
        return $this->redirectToRoute("afficheUser");
    }


    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @Route ("user/update/{id}", name="update")
     */

    function update($id, UserRepository $repository,Request $request){
        $user=$repository->find($id);
        $form=$this->createForm(UserType::class, $user);
        $form->add('update', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("afficheUser");
        }
        return $this->render('user/Update.html.twig', [
            'update_form'=>$form->createView()
        ]);
    }



}
