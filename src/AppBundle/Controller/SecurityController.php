<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    public function loginAction()
    {
        $authUtils = $this->get('security.authentication_utils');

        $error = $authUtils->getLastAuthenticationError();

        $lastUsername = $authUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
           'last_username' => $lastUsername,
            'error'        => $error,
        ));
    }

}