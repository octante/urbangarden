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

use Urban\UserBundle\Entity\AdminUser;

/**
 * Class AdminUserFactory
 */
class AdminUserFactory
{
    /**
     * Creates an instance of an entity.
     *
     * This method must return always an empty instance
     *
     * @return AdminUser Empty entity
     */
    public function create()
    {
        /**
         * @var AdminUser $adminUser
         */
        return (new AdminUser())
            ->setIsActive(true)
            ->setCreatedAt(new \Datetime());
    }
}
