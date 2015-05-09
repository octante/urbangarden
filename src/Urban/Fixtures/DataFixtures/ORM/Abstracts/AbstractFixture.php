<?php

namespace Fixtures\DataFixtures\ORM\Abstracts;

use Doctrine\Common\DataFixtures\AbstractFixture as DoctrineAbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Parser;


/**
 * AbstractFixture class
 */
abstract class AbstractFixture
    extends DoctrineAbstractFixture
    implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Set container
     *
     * @param ContainerInterface $container Container
     *
     * @return $this Self object
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;

        return $this;
    }
}
