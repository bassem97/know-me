<?php

namespace App\Controller;

use App\Form\ImageType;
use App\Entity\Photo;
use App\Repository\PhotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class PhotoController extends AbstractController
{
    /**
     * @Route("/photo", name="photo")
     */
    public function index(): Response
    {
        return $this->render('photo/index.html.twig', [
            'controller_name' => 'PhotoController',
        ]);
    }

    /**
     * @param PhotoRepository $repository
     * @Route ("/affichePhoto", name="affichePhoto")
     */

    function afficher(PhotoRepository $repository){
        $photo = $repository->findAll();
        return $this->render('photo/afficherPhoto.html.twig', ['photo'=> $photo]);
    }



    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return Response
     * @Route("photo/add")
     */

    function addPhoto(Request $request){
        $photo = new Photo();
        $form = $this->createForm(ImageType::class, $photo);
        $form->add('Ajouter', submitType::class);
        $form->handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()){

            $file=$photo->getImage();
            $fileName=md5(uniqid()).".".$file->guessExtension();

            try {
                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                $e->getMessage();
            }
            $photo->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em ->persist($photo);
            $em-> flush();

                    $this->addFlash('notice','Photo ajoutée!');
                    return $this->redirectToRoute("affichePhoto");


        }
        return $this->render('photo/addPhoto.html.twig', ['form' => $form->createView()]);
    }
}
