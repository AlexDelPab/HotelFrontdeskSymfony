<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends BaseController {

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
     * @Route("/rooms", name="rooms")
     */
    public function roomsAction() {
        return $this->render('@App/rooms.html.twig');
    }
}
