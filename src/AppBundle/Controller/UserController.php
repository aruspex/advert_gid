<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="main")
     */
    public function mainAction()
    {
        $hobbies = $this->getDoctrine()
            ->getRepository('AppBundle:Hobby')
            ->findAll();

        return $this->render('app/main.html.twig', array('hobbies' => $hobbies));
    }

    /**
     * @Route("/user/hobbies", name="user-hobbies")
     */
    public function userHobbiesAction()
    {
        $hobbies = $this->getUser()->getHobbies();

        return $this->render('app/user_hobbies.html.twig', array('hobbies' => $hobbies));
    }
}
