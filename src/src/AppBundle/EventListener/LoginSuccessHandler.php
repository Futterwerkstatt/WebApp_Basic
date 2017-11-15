<?php

namespace AppBundle\EventListener;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{

    protected $router;
    protected $security;

    public function __construct(Router $router, SecurityContext $security)
    {
        $this->router = $router;
        $this->security = $security;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {

        if ($this->security->isGranted('ROLE_SUPER_ADMIN') || $this->security->isGranted('ROLE_ADMIN')) {
            $response = new RedirectResponse($this->router->generate('admin_route'));
        } else {
            $response = new RedirectResponse($this->router->generate('user_route'));
        }
        return $response;
    }
}