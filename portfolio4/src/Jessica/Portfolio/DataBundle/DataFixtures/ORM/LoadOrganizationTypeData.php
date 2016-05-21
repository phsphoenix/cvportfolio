<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-21
 * Time: 21:20
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jessica\Portfolio\DataBundle\Entity\OrganizationType;

class LoadOrganizationTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    private $types = array(
        'Private Company',
        'Non-Profit',
        'Charity',
        'Local Government',
        'Central Government',
        'Public Institution',
        'University',
    );

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach($this->types as $type) {
            $organizationType = new OrganizationType();
            $organizationType->setName($type);
            $organizationType->setComments("Loaded by LoadOrganizationTypeData");
            $manager->persist($organizationType);
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
        return 4;
    }
}