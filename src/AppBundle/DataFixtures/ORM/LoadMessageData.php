<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Message;

class LoadMesageData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $message = new Message();
        $message->setName('Delphine');
        $message->setMessage('Yo');
        $manager->persist($message);

        $message = new Message();
        $message->setName('Geoffrey');
        $message->setMessage('Loo');
        $manager->persist($message);

        $manager->flush();
    }
}