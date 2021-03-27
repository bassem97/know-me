<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Form\MenuType;
use App\Repository\CategorieRepository;
use App\Repository\MenuRepository;
use App\Repository\UserRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Validator\Constraints\Date;

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
     * @Route("/menu/add/{categorie}", name="add-menu")
     * @param Request $request
     * @param $categorie
     * @return RedirectResponse|Response
     */
    function AddMenu(Request $request,$categorie,CategorieRepository $categorieRepository)
    {
        $menu = new Menu();
        $form = $this->CreateForm(MenuType::class, $menu);
        $menu->setCategorie($categorieRepository->find($categorie));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('img')->getData();
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
            return $this->redirectToRoute('menu-class',["crit" => "none","idCat" => $menu->getCategorie()->getId()]);
        }
        return $this->render('menu/AddMenu.html.twig', ['form' => $form->CreateView()]);
    }




    /**
     * @param MenuRepository $repository
     * @param CategorieRepository $categorieRepository
     * @param $crit
     * @param $idCat
     * @return Response
     * @Route ("/AfficherMenu/{crit}/{idCat}", name="menu-class")
     */
    public function Affiche(MenuRepository $repository, CategorieRepository $categorieRepository, $crit, $idCat)
    {
        $categories = $categorieRepository->findAll();
        $categorie = $categorieRepository->find($idCat);
        if($idCat != 0){
            $menu = $categorie->getMenus();
        }else{
            $menu = $repository->findAll();
        }


        for($i=0;$i<count($menu);$i++){
          if($menu[$i]->getExpireDate() < new \DateTime()){
              $menu[$i]->setIsExpired(true);
              $em = $this->getDoctrine()->getManager();
              $em->persist($menu[$i]);
              $em->flush();
          }
        }

        if($crit == "none"){
            return $this->render('menu/AfficheMenu.html.twig', [
                'categorie' => $categorie,
                'menu' => $menu,
                'categories' => $categories
            ]);
        }
        else{
            return $this->render('menu/AfficheMenu.html.twig', [
                'idCat' => $idCat,
                'categories' => $categories,
                'menu' => $repository->sortById($crit,"DESC")
            ]);
        }


    }


    /**
     * @param Request $request
     * @Route ("gerant/updateMenu/{id}", name="updateM")
     */
    function update($id, MenuRepository $repository, Request $request)
    {
        $menu = $repository->find($id);
        $form = $this->createForm(MenuType::class, $menu);
        $form->add('update', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('img')->getData();
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
            return $this->redirectToRoute("menu-class",["crit" => "none",'idCat' => $menu->getCategorie()->getId()]);
        }
        return $this->render('menu/modifier.html.twig', [
            'update_form' => $form->createView()
        ]);
    }

    /**
     * @Route("menu/search/{text}", name="search", methods={"GET","POST"})
     * @param MenuRepository $menuRepository
     * @param $text
     * @return Response
     */
    public function search(MenuRepository $menuRepository,$text): Response
    {

        return $this->render('user/index.html.twig', [
            'users' => $menuRepository->findAllWithSearch($text)
        ]);
    }


    /**
     * @Route("/event/Delete/{id}", name="deleteM")
     */
    function Delete($id, MenuRepository $rep)
    {
        $menu = $rep->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($menu);
        $em->flush();
        return $this->redirectToRoute("menu-class",["crit" => "none",'idCat' => $menu->getCategorie()->getId()]);
    }

    /**
     * @Route("/pdf", name="menu_pdf")
     * @param MenuRepository $menuRepository
     */
    public function listPDF(MenuRepository $menuRepository)
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('menu/templatePDF.html.twig', [
            'menus' => $menuRepository->findAll()
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("menus.pdf", [
            "Attachment" => false
        ]);
    }
}
