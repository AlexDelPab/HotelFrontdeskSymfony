<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseController extends Controller {

    public function putOrPost() {
        $request = $this->container->get('request_stack')->getCurrentRequest();
        return in_array($request->getMethod(), ['PUT', 'POST']);
    }

    /**
     * Validate input to prevent injections
     *
     * @param $input
     * @return array|string
     */
    public function validateInput($input) {
        $uncheckedValue = $input;
        $replace = array('\\', "'", '"', '$', ':', '[', ']', '{', '}', '<', '>', '/');

        if ($input === false) {
            return false;
        }

        if (is_array($input)) {
            foreach ($input as $key => $value) {
                $input[$key] = htmlentities(str_replace($replace, '', trim($value)), ENT_QUOTES);
            }

            $checkedValue = $input;
        } else {
            $checkedValue = htmlentities(str_replace($replace, '', trim($input)), ENT_QUOTES);
        }

        if ($uncheckedValue === $checkedValue) {
            return $checkedValue;
        }

        return false;
    }

    public static function ResponseSuccess($message) {
        $response = new JsonResponse();

        $response->setStatusCode(200);

        if (is_string($message)) {
            $response->setData(['message' => $message]);
        } else {
            $response->setData($message);
        }

        return $response;
    }

}
