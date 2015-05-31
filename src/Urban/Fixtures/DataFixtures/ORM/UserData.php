<?php


namespace Fixtures\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Fixtures\DataFixtures\ORM\Abstracts\AbstractFixture;

/**
 * Class AdminUserData
 */
class UserData extends AbstractFixture
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
        $user = $this
            ->container
            ->get('urbangarden.factory.user')
            ->create()
            ->setName('Homer')
            ->setSurname('Simpson')
            ->setEmail('homersimpson@fox.us');

        $factory = $this->container->get('security.encoder_factory');
        echo "crea usuari";

        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword('123456', $user->getSalt());
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}
