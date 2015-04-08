<?php

namespace Urban\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UrbanUserBundle:Default:index.html.twig');
    }
}
