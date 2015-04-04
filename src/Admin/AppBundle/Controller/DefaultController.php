<?php

namespace Admin\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdminAppBundle:Default:index.html.twig');
    }
}
