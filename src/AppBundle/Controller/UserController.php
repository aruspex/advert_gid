<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function mainAction()
    {
        $hobbies = $this->getDoctrine()
            ->getRepository('AppBundle:Hobby')
            ->findAll();

        return $this->render('app/main.html.twig', array('hobbies' => $hobbies));
    }

    public function userHobbiesAction()
    {
        $hobbies = $this->getUser()->getHobbies();

        return $this->render('app/user_hobbies.html.twig', array('hobbies' => $hobbies));
    }
}
