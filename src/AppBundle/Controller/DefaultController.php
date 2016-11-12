<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="main")
     */
    public function mainAction(Request $request)
    {
        $hobbies = $this->getDoctrine()
            ->getRepository('AppBundle:Hobby')
            ->findAll();

        return $this->render('app/main.html.twig', array('hobbies' => $hobbies));
    }

    /**
     * @Route("/user/hobbies", name="user-hobbies")
     */
    public function userHobbiesAction(Request $request)
    {
        $hobbies = $this->getUser()->getHobbies();

        return $this->render('app/user_hobbies.html.twig', array('hobbies' => $hobbies));
    }

    /**
     * @Route("/event-dispatcher", name="event-dispatcher")
     */
    public function eventDispatcherAction(Request $request)
    {
        $flashBag = $request->getSession()->getFlashBag();

        $result = '';

        if ($flashBag->has('query_param')) {
            $result = $flashBag->get('query_param')[0];
        }

        return new Response($result);
    }
}
