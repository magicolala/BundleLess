<?php

namespace Ced\FosLessBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CedFosLessBundle:Default:index.html.twig');
    }

    public function loginAction(Request $request)
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        $params = array(
            "last_username" => $session->get(SecurityContext::LAST_USERNAME),
            "error"         => $error,
        );

        return $this->render('CedFosLessBundle:Default:login.html.twig', $params);
    }

    /**
    * @Method({"POST"})
    * @Route("/login_check", name="login_check")
    */
    public function check()
    {
        throw new \RuntimeException('You must configure the check path to be handled by the firewall using form_login in your security firewall configuration.');
    }

    /**
    * @Method({"GET"})
    * @Route("/logout", name="logout")
    */
    public function logout()
    {
        throw new \RuntimeException('You must activate the logout in your security firewall configuration.');
    }
}
