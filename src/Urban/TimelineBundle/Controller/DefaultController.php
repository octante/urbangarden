<?php

namespace Urban\TimelineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UrbanTimelineBundle:Default:index.html.twig', array('name' => $name));
    }
}
