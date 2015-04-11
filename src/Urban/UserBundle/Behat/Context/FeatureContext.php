<?php

namespace Urban\UserBundle\Behat\Context;

/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\HttpFoundation\Session\Session;

class FeatureContext extends AbstractFeatureContext
{
    public function __construct(Session $session) {

    }

}