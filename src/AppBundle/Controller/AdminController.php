<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function usersAction()
    {
        $users = $this->getDoctrine()
            ->getRepository('AppBundle:User')->findAll();

        return $this->render('app/users.html.twig', array('users' => $users));
    }

}