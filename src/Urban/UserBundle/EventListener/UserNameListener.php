<?php
/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Urban\UserBundle\EventListener;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class UserNameListener
{
    protected $twig;
    protected $container;

    public function __construct(\Twig_Environment $twig, Container $container)
    {
        $this->twig = $twig;
        $this->container = $container;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        // To avoid debug toolbar error
        if ($this->container->get('security.token_storage')->getToken() != null) {

            $userData = $this->container->get('security.token_storage')->getToken()->getUser();

            $this->twig->addGlobal('user', $userData);
        }
    }
} 