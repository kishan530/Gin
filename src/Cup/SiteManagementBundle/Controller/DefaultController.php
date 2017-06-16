<?php

namespace Cup\SiteManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CupSiteManagementBundle:Default:index.html.twig');
    }
}
