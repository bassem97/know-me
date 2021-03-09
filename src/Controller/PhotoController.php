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
     * @Route("photo/add", name="addPhoto")
     */

    function addPhoto(Request $request){
        $photoos = new Photo();
        $form = $this->createForm(ImageType::class, $photoos);
        $form->add('Ajouter', submitType::class);
        $form->handleRequest($request);
        if ($form-> isSubmitted() && $form-> isValid()){

            //recuperer les valeurs sous forme d'objet photo
            $photoos = $form->getData();

            //recupere le file soumis
            $file=$photoos->getImage();

            //creer un nom unique
            $fileName=md5(uniqid()).".".$file->guessExtension();

            //deplacer le fichier
            try {
                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                $e->getMessage();
            }

            //donner le nom a l'image
            $photoos->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em ->persist($photoos);
            $em-> flush();

            $this->addFlash('notice','Photo ajoutée!');
            return $this->redirectToRoute("affichePhoto");
        }
        return $this->render('photo/addPhoto.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @param $id
     * @param PhotoRepository $repository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("/Supp/{id}", name="delete")
     */
    public function supprimerPhoto($id, PhotoRepository $repository){
        $photo=$repository->find($id);
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($photo);
        $entityManager->flush();
        return $this->redirectToRoute("affichePhoto");
    }




    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @Route ("updatePhoto/{id}", name="updateP")
     */
    function update($id, PhotoRepository $repository, Request $request)
    {
        $photo = $repository->find($id);
        $form = $this->createForm(ImageType::class, $photo);
        $form->add('update', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $file = $photo->getImage();
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
            $photo->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($photo);
            $em->flush();
            return $this->redirectToRoute("affichePhoto");
        }
        return $this->render('photo/updatePhoto.html.twig', [
            'update_photo' => $form->createView()
        ]);
    }
}
