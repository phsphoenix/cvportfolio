<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-23
 * Time: 21:43
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jessica\Portfolio\DataBundle\Entity\PortfolioProfileSection;

class LoadPortfolioProfileSectionData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $profileManager = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfile');
        $sectionManager = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioSection');
        $user = $manager->getRepository('JessicaPortfolioUserBundle:PortfolioUser')->findOneBy(array('username' => 'phoenix'));

        $public = $profileManager->findOneBy(array('user' => $user, 'url' => 'public'));
        $custom1 = $profileManager->findOneBy(array('user' => $user, 'url' => 'custom1'));
        $statement = $sectionManager->findOneBy(array('slug' => 'statement'));
        $experience = $sectionManager->findOneBy(array('slug' => 'experience'));

        $profiles = array($public, $custom1);
        $sections = array($statement, $experience);

        foreach($profiles as $profile) {
            $displayOrder = 0;

            foreach ($sections as $section) {
                $portfolioProfileSection = new PortfolioProfileSection();
                $portfolioProfileSection->setProfile($profile);
                $portfolioProfileSection->setSection($section);
                $portfolioProfileSection->setDisplayOrder($displayOrder);
                $portfolioProfileSection->setComments("Loaded by LoadPortfolioProfileSectionData");
                $displayOrder++;
                $manager->persist($portfolioProfileSection);
                $manager->flush();
            }
        }

        $user = $manager->getRepository('JessicaPortfolioUserBundle:PortfolioUser')->findOneBy(array('username' => 'shadowcat'));
        $public = $profileManager->findOneBy(array('user' => $user, 'url' => 'public'));
        $chas = $profileManager->findOneBy(array('user' => $user, 'url' => 'chas'));
        $bontouch = $profileManager->findOneBy(array('user' => $user, 'url' => 'bontouch'));
        $profiles = array($public, $chas, $bontouch);

        reset($sections);

        foreach($profiles as $profile) {
            $displayOrder = 0;

            foreach ($sections as $section) {
                $portfolioProfileSection = new PortfolioProfileSection();
                $portfolioProfileSection->setProfile($profile);
                $portfolioProfileSection->setSection($section);
                $portfolioProfileSection->setDisplayOrder($displayOrder);
                $portfolioProfileSection->setComments("Loaded by LoadPortfolioProfileSectionData");
                $displayOrder++;
                $manager->persist($portfolioProfileSection);
                $manager->flush();
            }
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 13;
    }
}