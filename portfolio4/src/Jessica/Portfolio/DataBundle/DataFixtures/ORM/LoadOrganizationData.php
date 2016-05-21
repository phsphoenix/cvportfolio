<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-21
 * Time: 21:40
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jessica\Portfolio\DataBundle\Entity\OrganizationType;
use Jessica\Portfolio\DataBundle\Entity\OrganizationSize;
use Jessica\Portfolio\DataBundle\Entity\Organization;

class LoadOrganizationData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    private $megaCorps = array(
        'ACME Corporation',
        'AJAX Corporation',
        'Aperture Science',
        'Buy More',
        'Cyberdyne Systems',
        'Evil Corp',
        'LexCorp',
        'MARS Industries',
        'Militaires Sans Frontieres',
        'Omni Consumer Products',
        'Palmer Technologies',
        'Queen Industries',
        'Stark Industries',
        'Umbrella Corporation',
        'Wayne Enterprises',
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
        $user = $manager->getRepository('JessicaPortfolioUserBundle:PortfolioUser')->findOneBy(array('username' => 'dracarys'));
        $type = $manager->getRepository('JessicaPortfolioDataBundle:OrganizationType')->findOneBy(array('name' => 'Private Company'));
        $size = $manager->getRepository('JessicaPortfolioDataBundle:OrganizationSize')->findOneBy(array('name' => '7500-10000'));

        foreach($this->megaCorps as $megaCorp) {
            $organization = new Organization();
            $organization->setUser($user);
            $organization->setType($type);
            $organization->setSize($size);
            $organization->setName($megaCorp);
            $organization->setFounded(new \DateTime("2000-01-01 00:00:00"));
            $manager->persist($organization);
            $manager->flush();
        }

        $size = $manager->getRepository('JessicaPortfolioDataBundle:OrganizationSize')->findOneBy(array('name' => '10-50'));

        $organization = new Organization();
        $organization->setUser($user);
        $organization->setType($type);
        $organization->setSize($size);
        $organization->setName("Bontouch");
        $manager->persist($organization);
        $manager->flush();

        $organization = new Organization();
        $organization->setUser($user);
        $organization->setType($type);
        $organization->setSize($size);
        $organization->setName("Awave");
        $manager->persist($organization);
        $manager->flush();

        $size = $manager->getRepository('JessicaPortfolioDataBundle:OrganizationSize')->findOneBy(array('name' => '100-250'));

        $organization = new Organization();
        $organization->setUser($user);
        $organization->setType($type);
        $organization->setSize($size);
        $organization->setName("ApeGroup");
        $manager->persist($organization);
        $manager->flush();

        $organization = new Organization();
        $organization->setUser($user);
        $organization->setType($type);
        $organization->setSize($size);
        $organization->setName("Chas");
        $manager->persist($organization);
        $manager->flush();

        $size = $manager->getRepository('JessicaPortfolioDataBundle:OrganizationSize')->findOneBy(array('name' => '500-1000'));

        $organization = new Organization();
        $organization->setUser($user);
        $organization->setType($type);
        $organization->setSize($size);
        $organization->setName("Netlight");
        $manager->persist($organization);
        $manager->flush();

        $size = $manager->getRepository('JessicaPortfolioDataBundle:OrganizationSize')->findOneBy(array('name' => '3000-5000'));

        $organization = new Organization();
        $organization->setUser($user);
        $organization->setType($type);
        $organization->setSize($size);
        $organization->setName("Cybercom");
        $manager->persist($organization);
        $manager->flush();

        $size = $manager->getRepository('JessicaPortfolioDataBundle:OrganizationSize')->findOneBy(array('name' => '3000-5000'));

        $organization = new Organization();
        $organization->setUser($user);
        $organization->setType($type);
        $organization->setSize($size);
        $organization->setName("HiQ");
        $manager->persist($organization);
        $manager->flush();

        $type = $manager->getRepository('JessicaPortfolioDataBundle:OrganizationType')->findOneBy(array('name' => 'University'));
        $size = $manager->getRepository('JessicaPortfolioDataBundle:OrganizationSize')->findOneBy(array('name' => '12500-15000'));

        $organization = new Organization();
        $organization->setUser($user);
        $organization->setType($type);
        $organization->setSize($size);
        $organization->setName("KTH");
        $manager->persist($organization);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 5;
    }


}