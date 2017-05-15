<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $manager;
    private $encoder;
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $this->encoder = $this->container->get('security.password_encoder');
        $this->manager = $manager;

        $this->loadUser1();
        $this->loadUser2();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 10;
    }

    private function loadUser1()
    {
        $user = (new User())
            ->setEmail('delphine.achini@orange.fr')
            ->setUsername('ayumiesan');

        $password = 'Delphine-1';
        $user->setPassword($this->encoder->encodePassword($user, $password));

        $this->manager->persist($user);
        $this->manager->flush();

        $this->addReference('user.delphine', $user);
    }
    private function loadUser2()
    {
        $user = (new User())
            ->setEmail('geoffrey.chameroy@gmail.com')
            ->setUsername('kurujai');

        $password = 'Delphine*52';
        $user->setPassword($this->encoder->encodePassword($user, $password));

        $this->manager->persist($user);
        $this->manager->flush();

        $this->addReference('user.geoffrey', $user);
    }
}
