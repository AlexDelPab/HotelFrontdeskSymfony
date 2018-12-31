<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller {

    public function putOrPost() {
        $request = $this->container->get('request_stack')->getCurrentRequest();
        return in_array($request->getMethod(), ['PUT', 'POST']);
    }

}
