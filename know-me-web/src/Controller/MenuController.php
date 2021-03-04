<?php

namespace App\Controller;

use App\Entity\Menu;
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
     * @Route("menu/add")
     */

    Function AddMenu(Request $request)
    {
        $Menu = new Menu();
        $form = $this->CreateForm(MenuType::class, $Menu);
        $form->add('add', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Menu);
            $em->flush();
            return $this->redirectToRoute('Affiche');
        }
        return $this->render('menu/AddMenu.html.twig', ['form' => $form->CreateView()]);
    }
    /*
     * @param MenuRepository $repository
     * @Route("Menu\Affiche",name="Affiche)
     */
    public function Affiche(MenuRepository $repository){
    $Menu=$repository->findAll();
    return $this->render('Menu/Affiche.html.twig',['$Menu'=>$Menu]);}
}