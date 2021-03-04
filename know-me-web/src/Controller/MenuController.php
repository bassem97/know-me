<?php

namespace App\Controller;

use App\Entity\menu;
use App\Form\MenuType;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     */
    public function index(): Response
    {
        return $this->render('menu/index.html.twig', [
            'controller_name' => 'MenuController',
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return Response
     * @Route("/menu/add",name="menu-class")
     */

    function AddMenu(Request $request)
    {
        $menu = new menu();
        $form = $this->CreateForm(MenuType::class, $menu);
        $form->add('add', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($menu);
            $em->flush();
            return $this->redirectToRoute('Affiche');
        }
        return $this->render('menu/AddMenu.html.twig', ['form' => $form->CreateView()]);
    }
    /**
     * @param MenuRepository $repository
     * @Route ("/AfficherMenu", name="menu-class")
     */
    public function Affiche(MenuRepository $repository)
    {
        $menu = $repository->findAll();
        return $this->render('event/AfficheEvents.html.twig', ['menu' => $menu]);
    }
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @Route ("menu/modifier/{id}", name="modifier")
     */

    function modifier($id, MenuRepository $repository, Request $request)
    {
        $menu = $repository->find($id);
        $form = $this->createForm(MenuType::class, $menu);
        $form->add('modifier', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("affiche");
        }
        return $this->render('menu/modifier.html.twig', [
            'update_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/menu/Delete/{id}", name="deleteM")
     */ function Delete($id, MenuRepository $rep)
    {
        $event = $rep->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute("affiche");
    }
}
