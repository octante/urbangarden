<?php

namespace Front\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Urban\UserBundle\Entity\User;
use Urban\UserBundle\Form\Type\RegisterType;

class HomeController extends Controller
{
    /**
     * Load signup form or insert new user in database
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

    }
}
