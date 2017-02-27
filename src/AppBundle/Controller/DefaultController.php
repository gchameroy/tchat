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
        $items = [];
        $item = new \stdClass();
        $item->name = "Moi";
        $item->message = "Prout";
        $item->time = "12:00";
        $items[] = $item;
        $item = new \stdClass();
        $item->name = "Toi";
        $item->message = "Prout aussi";
        $item->time = "12:01";
        $items[] = $item;

        // replace this example code with whatever you need
        return $this->render('AppBundle:chat:message.html.twig',
        ['items' => $items]);
    }
}
