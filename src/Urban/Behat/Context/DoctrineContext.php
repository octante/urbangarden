<?php

/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Urban\Behat\Context;

use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Input\ArrayInput;


/**
 * Class DoctrineContext
 */
class DoctrineContext extends AbstractFeatureContext
{
    /**
     * @BeforeScenario
     */
    public function prepare(BeforeScenarioScope $scope)
    {

        gc_collect_cycles();

        /**
         * @var Connection $doctrineConnection
         */
        $doctrineConnection = $this
            ->getContainer()
            ->get('doctrine')
            ->getConnection();

        if ($doctrineConnection->isConnected()) {
            $doctrineConnection->close();
        }

        $this->application->run(new ArrayInput([
            'command'          => 'doctrine:database:drop',
            '--env'            => 'test',
            '--no-interaction' => true,
            '--force'          => true,
            '--quiet'          => false,
        ]));

        if ($doctrineConnection->isConnected()) {
            $doctrineConnection->close();
        }

        $this->application->run(new ArrayInput([
            'command'          => 'doctrine:database:create',
            '--env'            => 'test',
            '--no-interaction' => true,
            '--quiet'          => false,
        ]));

        $this->application->run(new ArrayInput([
            'command'          => 'doctrine:schema:create',
            '--env'            => 'test',
            '--no-interaction' => true,
            '--quiet'          => true,
        ]));

        $this->application->run(new ArrayInput([
            'command'          => 'doctrine:fixtures:load',
            '--env'            => 'test',
            '--no-interaction' => false,
            '--fixtures'       => $this->kernel->getRootDir() . '/../src/Urban/Fixtures',
            '--quiet'          => true,
        ]));
    }

    /**
     * @AfterScenario
     */
    public function cleanDB(AfterScenarioScope $scope)
    {
        /*$this
            ->getContainer()
            ->get('doctrine')
            ->getConnection()
            ->close();

        $this->application->run(new ArrayInput([
            'command'          => 'doctrine:database:drop',
            '--env'            => 'test',
            '--no-interaction' => true,
            '--force'          => true,
            '--quiet'          => true,
        ]));*/
    }
}
