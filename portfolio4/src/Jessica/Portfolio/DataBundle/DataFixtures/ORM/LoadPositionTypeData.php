<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-22
 * Time: 15:14
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jessica\Portfolio\DataBundle\Entity\PositionType;

class LoadPositionTypeData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    private $types = array(
        'Summer Job',
        'Full Time',
        'Part-Time 75%',
        'Part-Time 50%',
        'Part-Time 25%',
        'Volunteering'
    );

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
        foreach($this->types as $type) {
            $positionType = new PositionType();
            $positionType->setName($type);
            $positionType->setComments("Loaded by LoadPositionTypeData");
            $manager->persist($positionType);
            $manager->flush();
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 7;
    }
}