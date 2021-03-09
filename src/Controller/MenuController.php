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
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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
     * @Route("/menu/Add", name="add-menu")
     */

    function AddMenu(Request $request)
    {
        $menu = new Menu();
        $form = $this->CreateForm(MenuType::class, $menu);
        $form->add('add', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $menu->getImg();
            $fileName = md5(uniqid()) . "." . $file->guessExtension();
            if ($file) {
                try {
                    $file->move(
                        $this->getParameter('images_directory'),
                        $fileName
                    );
                } catch (FileException $e) {
                    $e->getMessage();
                }
            }
            $menu->setImg($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($menu);
            $em->flush();
            return $this->redirectToRoute('menu-class');
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
        return $this->render('menu/AfficheMenu.html.twig', ['menu' => $menu]);
    }
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @Route ("gerant/updateMenu/{id}", name="updateM")
     */
    function update($id, MenuRepository $repository, Request $request)
    {
        $menu = $repository->find($id);
        $form = $this->createForm(MenuType::class, $menu);
        $form->add('update', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($menu);
            $em->flush();
            return $this->redirectToRoute("menu-class");
        }
        return $this->render('menu/modifier.html.twig', [
            'update_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/event/Delete/{id}", name="deleteM")
     */ function Delete($id, MenuRepository $rep)
    {
        $menu = $rep->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($menu);
        $em->flush();
        return $this->redirectToRoute("menu-class");
    }
}
