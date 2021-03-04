<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
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
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("Menu\Add")
     */
    Function AddMenu(Request $request)
    {
        $Menu = new Menu();
        $form = $this->CreateForm();
        $form->add('add', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Menu);
            $em->flush();
            return $this->redirecttoRoute('AfficheMenu');
        }
        return $this->render('Menu/AddMenu.html.twig', ['form' => $form->CreateView()]);
    }
    /*
     * @Route("Menu\Affiche",name="AfficheM)
     */
    public function AfficheM(MenuRepository $repository){
    $Menu=$repository->findAll();
    return $this->render('Menu/Affiche.html.twig',['$Menu'=>$Menu]);}
}