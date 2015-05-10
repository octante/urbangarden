<?php

/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Urban\UserBundle\Behat\Context;

use Urban\Behat\Context\AbstractFeatureContext;

class UserAbstractFeatureContext extends AbstractFeatureContext
{

    /**
     * @Given /^I am logged as "(?P<username>[^"]*)" - "(?P<password>[^"]*)"$/
     * @When /^I log in as "(?P<username>[^"]*)" - "(?P<password>[^"]*)"$/
     */
    public function iAmLoggedAs($username, $password)
    {
        $this->visitPath('/login');

        $page = $this
            ->getSession()
            ->getPage();

        $page->fillField('urbangarden_user_form_type_login__username', $username);
        $page->fillField('urbangarden_user_form_type_login__password', $password);
        $page->pressButton('urbangarden_user_form_type_login_send');
    }
} 