<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Entity\Menu;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/api/ingredient/")
 */
class ApiIngredientController extends AbstractController
{
    /**
     * @Route("list", name="api_ingredient_list")
     */
    public function index(NormalizerInterface $normalizer): Response
    {
        $menus = $this->getDoctrine()->getRepository(Ingredient::class)->findAll();
        $jsonContent = $normalizer->normalize($menus, 'json', ['groups' => 'ingredient']);
        return new Response(json_encode($jsonContent));

    }

    /**
     * @Route("ajouter/menu/{id}", name="ajout_ingredient_json")
     */
    public function new($id,Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager): Response{
        $content = $request->getContent();
        $ingredient = $serializer->deserialize($content, Ingredient::class, 'json');
        $menu = $this->getDoctrine()->getRepository(Menu::class)->find($id);
        $ingredient->setMenu($menu);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($ingredient);
        $entityManager->flush();
        return new Response("Ingredient Added");
    }

    /**
     * @Route("modifier/{id}", name="api_ingredient_update")
     */
    public function edit(?Ingredient $ingredient, Request $request): Response
    {
        if (!$ingredient) {
            return new Response("ingredient Not Found");
        }
        $ingredient->setDescription($request->get('description'));
        $menu = $this->getDoctrine()->getRepository(Menu::class)->find($request->get('menu_id'));
        $ingredient->setMenu($menu);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();
        return new Response("ingredient Updated");
    }

    /**
     * @Route("delete/{id}", name="api_ingredient_delete", methods={"DELETE"})
     */
    public function delete(?Ingredient $ingredient,EntityManagerInterface $entityManager): Response
    {
        if (!$ingredient) {
            return new Response("ingredient Not Found");
        }
        $entityManager->remove($ingredient);
        $entityManager->flush();
        return new Response("ingredient deleted");
    }

}
