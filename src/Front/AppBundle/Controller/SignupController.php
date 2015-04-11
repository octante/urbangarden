<?php

namespace Front\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Urban\UserBundle\Entity\User;
use Urban\UserBundle\Form\Type\RegisterType;

class SignupController extends Controller
{
    /**
     * Load signup form or insert new user in database
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function signupAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new RegisterType(), $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user->setCreatedAt(new \Datetime());

            $factory = $this->get('security.encoder_factory');

            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('front_app_signup_success');
        }

        return $this->render(
            'FrontAppBundle:Signup:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * Load page showing a message indicating user signup is successful
     */
    public function signupSuccessAction()
    {
        return $this->render(
            'FrontAppBundle:Signup:success.html.twig'
        );
    }
}
