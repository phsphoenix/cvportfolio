<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-22
 * Time: 12:41
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jessica\Portfolio\DataBundle\Entity\PersonalContactInformation;

class LoadPersonalInformationData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $user = $manager->getRepository('JessicaPortfolioUserBundle:PortfolioUser')->findOneBy(array('username' => 'shadowcat'));

        $information = new PersonalContactInformation();
        $information->setUser($user);
        $information->setFirstName("Kitty");
        $information->setLastName("Pryde");
        $information->setEmail($user->getEmail());
        $information->setMobile("+4607012345678");
        $manager->persist($information);
        $manager->flush();

        $user = $manager->getRepository('JessicaPortfolioUserBundle:PortfolioUser')->findOneBy(array('username' => 'phoenix'));

        $information = new PersonalContactInformation();
        $information->setUser($user);
        $information->setFirstName("Jean");
        $information->setLastName("Grey");
        $information->setEmail($user->getEmail());
        $information->setMobile("+4607012345678");
        $manager->persist($information);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}