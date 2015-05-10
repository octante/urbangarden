<?php

namespace Admin\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $userData = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render(
            'AdminAppBundle:Default:index.html.twig',
            array('user' => $userData)
        );
    }
}
