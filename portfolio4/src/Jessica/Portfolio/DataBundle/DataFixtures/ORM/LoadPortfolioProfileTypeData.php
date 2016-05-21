<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-22
 * Time: 16:03
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jessica\Portfolio\DataBundle\Entity\PortfolioProfileType;

class LoadPortfolioProfileTypeData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $type = new PortfolioProfileType();
        $type->setName("Public");
        $type->setComments("Loaded by LoadPortfolioProfileTypeData");
        $manager->persist($type);
        $manager->flush($type);

        $type = new PortfolioProfileType();
        $type->setName("Custom");
        $type->setComments("Loaded by LoadPortfolioProfileTypeData");
        $manager->persist($type);
        $manager->flush($type);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 10;
    }


}