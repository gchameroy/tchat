<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Message;

class LoadMessageData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /** @var User $user */
        $user = $this->getReference('user.delphine');

        $message = new Message($user);
        $message->setMessage('Yo');
        $manager->persist($message);

        /** @var User $user */
        $user = $this->getReference('user.geoffrey');

        $message = new Message($user);
        $message->setMessage('Loo');
        $manager->persist($message);

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }
}
