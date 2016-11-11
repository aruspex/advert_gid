<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends AbstractFixture implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setPassword('admin');
        $userAdmin->setRole(User::ROLE_ADMIN);

        $userAdmin->addHobby($this->getReference(LoadHobbyData::HOBBY_FISHING));
        $userAdmin->addHobby($this->getReference(LoadHobbyData::HOBBY_HIKING));

        $manager->persist($userAdmin);

        $regularUser = new User();
        $regularUser->setUsername('user');
        $regularUser->setPassword('user');
        $regularUser->setRole(User::ROLE_USER);

        $regularUser->addHobby($this->getReference(LoadHobbyData::HOBBY_LEARNING));
        $regularUser->addHobby($this->getReference(LoadHobbyData::HOBBY_READING));

        $manager->persist($regularUser);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}