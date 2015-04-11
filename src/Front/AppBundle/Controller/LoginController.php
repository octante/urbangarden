<?php

namespace Front\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Urban\UserBundle\Entity\User;
use Urban\UserBundle\Form\Type\LoginType;

class LoginController extends Controller
{
    /**
     * Load login page
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function loginAction()
    {
        $authorizationChecker = $this->get('security.authorization_checker');
        if ($authorizationChecker->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('admin_app_homepage');
        }

        $form = $this->createForm(new LoginType());

        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'FrontAppBundle:Login:login.html.twig',
            array(
                'form' => $form->createView(),
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }
}
