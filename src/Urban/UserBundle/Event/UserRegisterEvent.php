<?php
/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Urban\UserBundle\Event;


use Symfony\Component\EventDispatcher\Event;
use Urban\UserBundle\Entity\Interfaces\AbstractUserInterface;

class UserRegisterEvent extends Event
{
    /**
     * @var AbstractUserInterface
     *
     * User
     */
    protected $user;

    /**
     * Construct method
     *
     * @param AbstractUserInterface $user User
     */
    public function __construct(AbstractUserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @return AbstractUserInterface User
     */
    public function getUser()
    {
        return $this->user;
    }
} 