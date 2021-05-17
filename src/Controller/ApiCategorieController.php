<?php

namespace App\Controller;

use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/api/categorie/")
 */
class ApiCategorieController extends AbstractController
{
    /**
     * @Route("list", name="api_categorie_list")
     */
    public function index(NormalizerInterface $normalizer): Response
    {
        $categories = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        $jsonContent = $normalizer->normalize($categories, 'json', ['groups' => 'categorie']);
        return new Response(json_encode($jsonContent));

    }

    /**
     * @Route("ajouter", name="ajout_json")
     */
    public function new(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager): Response{
        $content = $request->getContent();
        $data = $serializer->deserialize($content,Categorie::class,'json');
        $entityManager->persist($data);
        $entityManager->flush();
        return new Response('categorie ajouté !!');
    }

    /**
     * @Route("modifier/{id}", name="api_categorie_update", methods={"PUT"})
     */
    public function edit(?Categorie $categorie, Request $request): Response
    {
        $data = json_decode($request->getContent());
        if (!$categorie) {
            return new Response("categorie Not Found");
        }
        $categorie->setNom($data->nom);
        $categorie->setDescription($data->description);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();
        return new Response("categorie Updated");
    }

    /**
     * @Route("delete/{id}", name="api_categorie_delete", methods={"DELETE"})
     */
    public function delete(?Categorie $categorie,EntityManagerInterface $entityManager): Response
    {
        if (!$categorie) {
            return new Response("categorie Not Found");
        }
        $entityManager->remove($categorie);
        $entityManager->flush();
        return new Response("categorie deleted");
    }

}
