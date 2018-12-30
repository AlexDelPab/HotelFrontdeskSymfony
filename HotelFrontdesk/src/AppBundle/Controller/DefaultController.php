<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller {

    /**
     * @Route("/", name="index")
     */
    public function indexAction() {
        return $this->render('@App/index.html.twig');
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blogAction() {
        return $this->render('@App/blog.html.twig');
    }

    /**
     * @Route("/blogSingle", name="blog_single")
     */
    public function blogSingleAction() {
        return $this->render('@App/blog.single.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction() {
        return $this->render('@App/about.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction() {
        return $this->render('@App/contact.html.twig');
    }

    /**
     * @Route("/booknow", name="booknow")
     */
    public function booknowAction() {
        return $this->render('@App/booknow.html.twig');
    }

    /**
     * @Route("/rooms", name="rooms")
     */
    public function roomsAction() {
        return $this->render('@App/rooms.html.twig');
    }
}
