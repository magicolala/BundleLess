<?php

namespace Ced\FosLessBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CedFosLessBundle:Default:index.html.twig');
    }
}
