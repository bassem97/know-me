<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Menu;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/api/menu/")
 */
class ApiMenuController extends AbstractController
{
    /**
     * @Route("list", name="api_menu_list")
     */
    public function index(NormalizerInterface $normalizer): Response
    {
        $menus = $this->getDoctrine()->getRepository(Menu::class)->findAll();
        $jsonContent = $normalizer->normalize($menus, 'json', ['groups' => 'menu']);
        return new Response(json_encode($jsonContent));

    }

    /**
     * @Route("ajouter/categorie/{id}", name="ajout_menu_json")
     */
    public function new($id,Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager): Response{
        $content = $request->getContent();
        $menu = $serializer->deserialize($content, Menu::class, 'json');
        $categorie = $this->getDoctrine()->getRepository(Categorie::class)->find($id);
        $menu->setCategorie($categorie);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($menu);
        $entityManager->flush();
        return new Response("Menu Added");
    }

    /**
     * @Route("modifier/{id}", name="api_menu_update")
     */
    public function edit(?Menu $menu, Request $request): Response
    {
        if (!$menu) {
            return new Response("menu Not Found");
        }
        $menu->setName($request->get('name'));
        $menu->setDescription($request->get('description'));
        $menu->setImg($request->get('img'));
        $menu->setIsExpired($request->get('is_expired'));
        $categorie = $this->getDoctrine()->getRepository(Categorie::class)->find($request->get('categorie_id'));
        $menu->setCategorie($categorie);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();
        return new Response("menu Updated");
    }

    /**
     * @Route("delete/{id}", name="api_menu_delete", methods={"DELETE"})
     */
    public function delete(?Menu $menu,EntityManagerInterface $entityManager): Response
    {
        if (!$menu) {
            return new Response("menu Not Found");
        }
        $entityManager->remove($menu);
        $entityManager->flush();
        return new Response("menu deleted");
    }

}
