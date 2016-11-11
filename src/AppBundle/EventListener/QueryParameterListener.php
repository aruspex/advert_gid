<?php

namespace AppBundle\EventListener;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class QueryParameterListener
{
    /** @var Router  */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        if ($request->query->has('param')) {
            $session = $request->getSession()->getFlashBag()->add('query_param', $request->query->get('param'));
            $url = $this->router->generate('event-dispatcher');
            $response = new RedirectResponse($url);
            $event->setResponse($response);
        }

    }

}