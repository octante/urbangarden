<?php

namespace Admin\AppBundle\Behat\Context;

/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Symfony2Extension\Context\KernelAwareContext;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

abstract class AbstractFeatureContext
    extends RawMinkContext
    implements Context, KernelAwareContext
{
    /**
     * @var KernelInterface
     *
     * Kernel
     */
    protected $kernel;

    /**
     * @var Application
     *
     * application
     */
    protected $application;

    /**
     * Sets Kernel instance.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
        $this->application = new Application($this->kernel);
        $this->application->setAutoExit(false);
    }

    /**
     * Returns Container instance.
     *
     * @return ContainerInterface
     */
    protected function getContainer()
    {
        return $this
            ->kernel
            ->getContainer();
    }

    /**
     *
     * /**
     * Get url generator
     *
     * @return UrlGeneratorInterface Url generator
     */
    public function getUrlGenerator()
    {
        return $this
            ->getContainer()
            ->get('router');
    }

    /**
     * Get route given name and parameters
     *
     * @param string $routeName       Route name
     * @param array  $routeParameters Route parameters
     *
     * @return string Route path
     */
    public function getRoute($routeName, array $routeParameters = [])
    {
        return $this
            ->getUrlGenerator()
            ->generate($routeName, $routeParameters);
    }

    /**
     * @Given /^In admin, I am logged as "(?P<username>[^"]*)" - "(?P<password>[^"]*)"$/
     * @When /^In admin, I log in as "(?P<username>[^"]*)" - "(?P<password>[^"]*)"$/
     */
    public function inAdminIAmLoggedAs($username, $password)
    {
        $this->visitPath('/admin/login');

        $page = $this
            ->getSession()
            ->getPage();

        $page->fillField('elcodi_admin_user_form_type_login_email', $username);
        $page->fillField('elcodi_admin_user_form_type_login_password', $password);
        $page->pressButton('submit-login');
    }
}