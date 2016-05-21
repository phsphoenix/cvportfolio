<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-23
 * Time: 21:19
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jessica\Portfolio\DataBundle\Entity\PortfolioSection;

class LoadPortfolioSectionData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    private $sections = array(
        'summary' => 'Summary',
        'statement' => 'Personal Statement',
        'experience' => 'Experience',
        'education' => 'Education',
        'certifications' => 'Cerficiations',
        'skills' => 'Skills',
        'languages' => 'Languages',
        'projects' => 'Projects',
        'organizations' => 'Organizations',
        'volunteering' => 'Volunteering',
        'additional' => 'Additional Info',

    );
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
        foreach($this->sections as $slug => $section) {
            $portfolioSection = new PortfolioSection();
            $portfolioSection->setSlug($slug);
            $portfolioSection->setName($section);
            $portfolioSection->setComments("Loaded by LoadPortfolioSectionData");
            $manager->persist($portfolioSection);
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
        return 12;
    }
}