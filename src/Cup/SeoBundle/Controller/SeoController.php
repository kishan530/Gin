<?php

namespace Cup\SeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SeoController extends Controller
{
    public function bangaloreAction()
    {
        return $this->render('CupSeoBundle:Default:bangalore.html.twig');
    }
    public function delhiAction()
    {
        return $this->render('CupSeoBundle:Default:delhi.html.twig');
    }
    public function noidaAction()
    {
        return $this->render('CupSeoBundle:Default:noida.html.twig');
    }
    public function gurgaonAction()
    {
        return $this->render('CupSeoBundle:Default:gurgaon.html.twig');
    }
    public function puneAction()
    {
        return $this->render('CupSeoBundle:Default:pune.html.twig');
    }
    public function mumbaiAction()
    {
        return $this->render('CupSeoBundle:Default:mumbai.html.twig');
    }
}
