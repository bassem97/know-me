<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Message;
use App\Form\MessageFormType;

class MessageController extends AbstractController
{
    /**
     * @Route("/message", name="message")
     */
    public function index(): Response
    {
        return $this->render('message/index.html.twig', [
            'controller_name' => 'MessageController',
        ]);
    }
      // ...

    /**
     * @Route("/sendMessage", name="sendMessage")
     */
    public function addMessage(Request $request): Response
    {
        $message = new Message();
        $form = $this->createForm(MessageFormType::class, $message);
        $form->handleRequest($request);
    
        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($message);
            $entityManager->flush();
        }
    
        return $this->render("message/index.html.twig", [
            "form_title" => "Envoyer un message",
            "form_message" => $form->createView(),
        ]);
    }
    /**
 * @Route("/messages", name="messages")
 */
public function messages()
{
    $messages = $this->getDoctrine()->getRepository(Message::class)->findAll();

    return $this->render('message/List.html.twig', [
        "messages" => $messages,
    ]);
}
}
