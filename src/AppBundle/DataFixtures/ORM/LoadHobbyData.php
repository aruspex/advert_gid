<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Hobby;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadHobbyData extends AbstractFixture implements FixtureInterface
{
    const HOBBY_READING   = 'reading';
    const HOBBY_LEARNING  = 'learning';
    const HOBBY_TRAVELING = 'traveling';
    const HOBBY_HIKING    = 'hiking';
    const HOBBY_FISHING   = 'fishing';

    const HOBBIES = array(
        self::HOBBY_READING, self::HOBBY_LEARNING,
        self::HOBBY_TRAVELING, self::HOBBY_HIKING,
        self::HOBBY_FISHING
    );

    public function load(ObjectManager $manager)
    {
        foreach (self::HOBBIES as $hobby_name)
        {
            $hobby = new Hobby();
            $hobby->setName($hobby_name);
            $this->addReference($hobby_name, $hobby);

            $manager->persist($hobby);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}