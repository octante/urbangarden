<?php

/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Urban\UserBundle\Factory;

use Urban\UserBundle\Entity\User;

/**
 * Class UserFactory
 */
class UserFactory
{
    /**
     * Creates an instance of an entity.
     *
     * This method must return always an empty instance
     *
     * @return User Empty entity
     */
    public function create()
    {
        /**
         * @var User $adminUser
         */
        return (new User())
            ->setIsActive(true)
            ->setCreatedAt(new \Datetime());
    }
}
