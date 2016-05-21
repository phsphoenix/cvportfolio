<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-24
 * Time: 16:58
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Jessica\Portfolio\DataBundle\Entity\ProfilePersonalStatement;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProfilePersonalStatementData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
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
        $public = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfile')->findOneBy(array('user' => $user, 'url' => 'public'));
        $custom1 = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfile')->findOneBy(array('user' => $user, 'url' => 'custom1'));
        $statement1 = $manager->getRepository('JessicaPortfolioDataBundle:PersonalStatement')->findOneBy(array('user' => $user, 'name' => 'Statement1'));
        $statement2 = $manager->getRepository('JessicaPortfolioDataBundle:PersonalStatement')->findOneBy(array('user' => $user, 'name' => 'Statement2'));

        $profilePersonalStatement = new ProfilePersonalStatement();
        $profilePersonalStatement->setProfile($public);
        $profilePersonalStatement->setPersonalStatement($statement1);
        $profilePersonalStatement->setComments("Loaded by LoadProfilePersonalStatementData");
        $manager->persist($profilePersonalStatement);
        $manager->flush($profilePersonalStatement);

        $profilePersonalStatement = new ProfilePersonalStatement();
        $profilePersonalStatement->setProfile($custom1);
        $profilePersonalStatement->setPersonalStatement($statement2);
        $profilePersonalStatement->setComments("Loaded by LoadProfilePersonalStatementData");
        $manager->persist($profilePersonalStatement);
        $manager->flush($profilePersonalStatement);

        $user = $manager->getRepository('JessicaPortfolioUserBundle:PortfolioUser')->findOneBy(array('username' => 'shadowcat'));
        $public = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfile')->findOneBy(array('user' => $user, 'url' => 'public'));
        $bontouch = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfile')->findOneBy(array('user' => $user, 'url' => 'bontouch'));
        $chas = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfile')->findOneBy(array('user' => $user, 'url' => 'chas'));
        $generalStatement = $manager->getRepository('JessicaPortfolioDataBundle:PersonalStatement')->findOneBy(array('user' => $user, 'name' => 'General'));
        $bontouchStatement = $manager->getRepository('JessicaPortfolioDataBundle:PersonalStatement')->findOneBy(array('user' => $user, 'name' => 'BonTouch'));
        $chasStatement = $manager->getRepository('JessicaPortfolioDataBundle:PersonalStatement')->findOneBy(array('user' => $user, 'name' => 'Chas'));

        $profilePersonalStatement = new ProfilePersonalStatement();
        $profilePersonalStatement->setProfile($public);
        $profilePersonalStatement->setPersonalStatement($generalStatement);
        $profilePersonalStatement->setComments("Loaded by LoadProfilePersonalStatementData");
        $manager->persist($profilePersonalStatement);
        $manager->flush($profilePersonalStatement);

        $profilePersonalStatement = new ProfilePersonalStatement();
        $profilePersonalStatement->setProfile($bontouch);
        $profilePersonalStatement->setPersonalStatement($bontouchStatement);
        $profilePersonalStatement->setComments("Loaded by LoadProfilePersonalStatementData");
        $manager->persist($profilePersonalStatement);
        $manager->flush($profilePersonalStatement);

        $profilePersonalStatement = new ProfilePersonalStatement();
        $profilePersonalStatement->setProfile($chas);
        $profilePersonalStatement->setPersonalStatement($chasStatement);
        $profilePersonalStatement->setComments("Loaded by LoadProfilePersonalStatementData");
        $manager->persist($profilePersonalStatement);
        $manager->flush($profilePersonalStatement);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 15;
    }
}