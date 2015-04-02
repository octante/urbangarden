<?php

namespace Front\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FrontAppBundle:Default:index.html.twig', array('name' => $name));
    }
}
