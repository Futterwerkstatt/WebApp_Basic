<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $userAdmin = new User();
        $userAdmin
                ->setUsername('admin')
                ->setPassword('admin')
                ->setEmail('admin@mail.com')
                ->setEnabled(true)
                ->setRoles(array('ROLE_ADMIN'));

        $manager->persist($userAdmin);

        $user = new User();
        $user
                ->setUsername('user')
                ->setPassword('user')
                ->setEmail('user@mail.com')
                ->setEnabled(true)
                ->setRoles(array('ROLE_USER'));

        $manager->persist($user);

        $manager->flush();
        $this->addReference('user-admin', $userAdmin);
        $this->addReference('user', $user);
    }

    public function getOrder() {
        return 1;
    }

}
