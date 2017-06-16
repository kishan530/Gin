<?php

namespace Cup\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CupSecurityBundle:Default:index.html.twig');
    }
}
