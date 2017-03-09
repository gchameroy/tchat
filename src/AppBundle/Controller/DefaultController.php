<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use AppBundle\Form\Type\MessageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="message")
     */
    public function messageAction()
    {
        $messages = $this->getDoctrine()
            ->getRepository('AppBundle:Message')
            ->findAll();

        return $this->render('AppBundle:chat:message.html.twig', [
            'messages' => $messages
        ]);
    }

    /**
     * @Route("/add", name="add_message")
     */
    public function addAction(Request $request)
    {
        $message = new Message();

        $form = $this->createForm(MessageType::class, $message, array(
            'action' => $this->generateUrl('add_message')
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $message = $form->getData();

             $em = $this->getDoctrine()->getManager();
             $em->persist($message);
             $em->flush();

            return $this->redirectToRoute('message');
        }

        return $this->render('AppBundle:chat:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
