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

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CalendarController extends Controller
{
    /**
     * Show calendar
     *
     */
    public function indexAction()
    {
        return $this->render(
            'AdminAppBundle:Calendar:index.html.twig'
        );
    }
} 