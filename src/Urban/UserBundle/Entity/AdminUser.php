<?php
/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Urban\UserBundle\Entity;


class AdminUser extends AbstractUser
{
    /**
     * @inheritdoc
     */
    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }
}