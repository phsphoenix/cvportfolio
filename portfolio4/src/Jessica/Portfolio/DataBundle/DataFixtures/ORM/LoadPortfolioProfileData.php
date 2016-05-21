<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-23
 * Time: 17:38
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jessica\Portfolio\DataBundle\Entity\PortfolioProfile;

class LoadPortfolioProfileData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
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
        $user = $manager->getRepository('JessicaPortfolioUserBundle:PortfolioUser')->findOneBy(array('username' => 'phoenix'));
        $public = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfileType')->findOneBy(array('name' => 'public'));
        $custom = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfileType')->findOneBy(array('name' => 'custom'));

        $generated = "Loaded by LoadPortfolioProfileData";

        $profile = new PortfolioProfile();
        $profile->setUser($user);
        $profile->setType($public);
        $profile->setUrl('public');
        $profile->setName($user->getUsername().' public profile');
        $profile->setComments($custom);
        $manager->persist($profile);
        $manager->flush();

        $profile = new PortfolioProfile();
        $profile->setUser($user);
        $profile->setType($custom);
        $profile->setUrl('custom1');
        $profile->setName($user->getUsername().' custom profile');
        $profile->setComments($generated);
        $manager->persist($profile);
        $manager->flush();

        $user = $manager->getRepository('JessicaPortfolioUserBundle:PortfolioUser')->findOneBy(array('username' => 'shadowcat'));

        $profile = new PortfolioProfile();
        $profile->setUser($user);
        $profile->setType($public);
        $profile->setUrl('public');
        $profile->setName($user->getUsername().' public profile');
        $profile->setComments($custom);
        $manager->persist($profile);
        $manager->flush();

        $profile = new PortfolioProfile();
        $profile->setUser($user);
        $profile->setType($custom);
        $profile->setUrl('chas');
        $profile->setName($user->getUsername().' custom profile');
        $profile->setComments($generated);
        $manager->persist($profile);
        $manager->flush();

        $profile = new PortfolioProfile();
        $profile->setUser($user);
        $profile->setType($custom);
        $profile->setUrl('bontouch');
        $profile->setName($user->getUsername().' custom profile');
        $profile->setComments($generated);
        $manager->persist($profile);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 11;
    }
}