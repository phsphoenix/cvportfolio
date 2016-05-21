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
use Jessica\Portfolio\DataBundle\Entity\OrganizationSize;

class LoadOrganizationSizeData extends AbstractFixture implements OrderedFixtureInterface
{
    private $sizes = array(
        '1-10',
        '10-50',
        '50-100',
        '100-250',
        '250-500',
        '500-1000',
        '1000-1500',
        '1500-3000',
        '3000-5000',
        '5000-7500',
        '7500-10000',
        '10000-12500',
        '12500-15000'
    );

    public function load(ObjectManager $manager) {
        foreach($this->sizes as $size) {
            $organizationSize = new OrganizationSize();
            $organizationSize->setName($size);
            $organizationSize->setComments("Loaded by LoadOrganizationSizeData");
            $manager->persist($organizationSize);
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
        return 3;
    }
}