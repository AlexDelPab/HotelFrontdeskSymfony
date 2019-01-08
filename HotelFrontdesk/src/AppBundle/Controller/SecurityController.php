<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends BaseController {

    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(AuthenticationUtils $authenticationUtils) {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        if ($this->getUser()) {
            return $this->redirectToRoute('admin_index');
        }

        return $this->render('@App/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));
    }

    /**
     * @Route("/login_check", name="login_check")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginCheckAction(Request $request) {
        return $this->redirectToRoute('login');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction() {
        $this->get('request_stack')->getCurrentRequest()->getSession()->invalidate();
        return $this->redirectToRoute('index');
    }

//    /**
//     * @Route("/register", name="register")
//     * @param Request $request
//     * @param UserPasswordEncoderInterface $passwordEncoder
//     * @return \Symfony\Component\HttpFoundation\Response
//     */
//    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
//        if ($this->putOrPost()) {
//            $password = $this->validateInput($request->get('_password'));
//            $username = $this->validateInput($request->get('_username'));
//
//            if ($username && $password) {
//                $user = new User();
//                $user
//                    ->setUsername($username)
//                    ->setPassword($passwordEncoder->encodePassword($user, $password))
//                    ->setLastLogin(new \DateTime())
//                    ->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
//
//                $manager = $this->getDoctrine()->getManager();
//                $manager->persist($user);
//                $manager->flush();
//
//                $this->addFlash('success', 'Successfully registered ' . $username . '!');
//            }
//        }
//
//        return $this->render('@App/security/register.html.twig');
//    }
}
