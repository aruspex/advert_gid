<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MiscController
{
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