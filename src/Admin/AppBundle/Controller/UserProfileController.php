<?php
/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Admin\AppBundle\Controller;

use Admin\AppBundle\Form\Type\UserProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Urban\UserBundle\Entity\User;

class UserProfileController extends Controller
{
    /**
     * Show user profile
     *
     * @param Request $request
     *
     * @return Response A Response instance
     *
     * @throws \Exception
     */
    public function editAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if (!$user instanceof User) {
            throw new \Exception('Invalid user');
        }

        $form = $this->createForm(new UserProfileType(), $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
            } catch (\Exception $e) {
                if (23000 == $e->getPrevious()->getCode()) {
                    $this->addFlash(
                        'error',
                        'E-mail is registered yet.'
                    );

                    return $this->render(
                        'AdminAppBundle:Profile:profile.html.twig',
                        array(
                            'form' => $form->createView()
                        )
                    );
                }
            }

            $this->addFlash(
                'notice',
                'Profile updated'
            );
            return $this->redirectToRoute('admin_app_user_profile');
        }

        return $this->render(
            'AdminAppBundle:Profile:profile.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
} 