<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
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
