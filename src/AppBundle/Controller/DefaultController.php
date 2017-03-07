<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/{name}", name="hello")
     */
    public function helloAction($name)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:accueil:hello.html.twig',["name" => $name]);
    }

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
}
