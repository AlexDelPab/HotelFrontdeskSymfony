<?php

namespace AdminBundle\Controller;

use AppBundle\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends BaseController {
    /**
     * @Route("/index", name="admin_index")
     */
    public function indexAction() {
        return $this->render('@App/index.html.twig');
    }

    /**
     * @Route("/booknow", name="booknow")
     */
    public function booknowAction() {
        return $this->render('@Admin/booknow.html.twig');
    }
}
