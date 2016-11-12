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

    public function displayHobbyUsersAction($hobbyName)
    {
        $hobby = $this->getDoctrine()
            ->getRepository('AppBundle:Hobby')
            ->findOneBy(array('name' => $hobbyName));

        if (!$hobby) {
            throw $this->createNotFoundException($hobbyName . ' hobby does not exist!');
        }

        return $this->render(':app:hobby_users.html.twig', array('hobby' => $hobby));

    }
}