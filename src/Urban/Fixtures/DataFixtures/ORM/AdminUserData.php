<?php


namespace Fixtures\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Fixtures\DataFixtures\ORM\Abstracts\AbstractFixture;

/**
 * Class AdminUserData
 */
class AdminUserData extends AbstractFixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /**
         * @var $userAdmin
         */
        $adminUser = $this
            ->container
            ->get('urbangarden.factory.admin')
            ->create()
            ->setName('Marge')
            ->setSurname('Simpson')
            ->setEmail('margesimpson@fox.us');

        $factory = $this->container->get('security.encoder_factory');

        $encoder = $factory->getEncoder($adminUser);
        $password = $encoder->encodePassword('123456', '');
        $adminUser->setPassword($password);

        $manager->persist($adminUser);
        $manager->flush();
    }
}
