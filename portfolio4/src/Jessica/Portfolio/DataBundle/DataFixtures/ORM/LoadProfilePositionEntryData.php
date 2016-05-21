<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-24
 * Time: 15:14
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Jessica\Portfolio\DataBundle\Entity\PositionEntry;
use Jessica\Portfolio\DataBundle\Entity\ProfilePositionEntry;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProfilePositionEntryData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $positionEntries = $manager->getRepository('JessicaPortfolioDataBundle:PositionEntry')->findBy(array('user' => $user));
        $public = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfile')->findOneBy(array('user' => $user, 'url' => 'public'));
        $custom1 = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfile')->findOneBy(array('user' => $user, 'url' => 'custom1'));

        $i = 0;
        $displayEven = 0;
        $displayOdd = 0;

        foreach($positionEntries as $entry) {
            $profilePositionEntry = new ProfilePositionEntry();

            $even = $i % 2;

            if ($even == 0) {
                $profilePositionEntry->setProfile($public);
                $profilePositionEntry->setDisplayOrder($displayEven);
                $displayEven++;
            }
            else {
                $profilePositionEntry->setProfile($custom1);
                $profilePositionEntry->setDisplayOrder($displayOdd);
                $displayOdd++;
            }

            $profilePositionEntry->setPositionEntry($entry);
            $profilePositionEntry->setComments('Loaded by LoadProfilePositionEntryData');
            $manager->persist($profilePositionEntry);
            $manager->flush();
            $i++;
        }

        $user = $manager->getRepository('JessicaPortfolioUserBundle:PortfolioUser')->findOneBy(array('username' => 'shadowcat'));
        $public = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfile')->findOneBy(array('user' => $user, 'url' => 'public'));
        $bontouch = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfile')->findOneBy(array('user' => $user, 'url' => 'bontouch'));
        $chas = $manager->getRepository('JessicaPortfolioDataBundle:PortfolioProfile')->findOneBy(array('user' => $user, 'url' => 'chas'));
        $class = get_class(new PositionEntry());

        $displayOrder = 0;

        $queryString = "SELECT e FROM {$class} e WHERE e.title LIKE :title AND e.description LIKE :description";
        $query = $manager->createQuery($queryString);
        $query->setParameters(array('title' => '%Teacher%', 'description' => '%graduate%'));
        $positionEntries = $query->getResult();
        $positionEntry = $positionEntries[0];
        $profilePositionEntry = new ProfilePositionEntry();
        $profilePositionEntry->setProfile($public);
        $profilePositionEntry->setDisplayOrder($displayOrder);
        $displayOrder++;
        $profilePositionEntry->setPositionEntry($positionEntry);
        $profilePositionEntry->setComments("Loaded by LoadProfilePositionEntryData");
        $manager->persist($profilePositionEntry);
        $manager->flush();

        $queryString = "SELECT e FROM {$class} e WHERE e.title LIKE :title AND e.description LIKE :description";
        $query = $manager->createQuery($queryString);
        $query->setParameters(array('title' => '%Junior%', 'description' => '%technologies%'));
        $positionEntries = $query->getResult();
        $positionEntry = $positionEntries[0];
        $profilePositionEntry = new ProfilePositionEntry();
        $profilePositionEntry->setProfile($public);
        $profilePositionEntry->setDisplayOrder($displayOrder);
        $displayOrder++;
        $profilePositionEntry->setPositionEntry($positionEntry);
        $profilePositionEntry->setComments("Loaded by LoadProfilePositionEntryData");
        $manager->persist($profilePositionEntry);
        $manager->flush();

        $queryString = "SELECT e FROM {$class} e WHERE e.title LIKE :title AND e.description LIKE :description";
        $query = $manager->createQuery($queryString);
        $query->setParameters(array('title' => '%Senior%', 'description' => '%technologies%'));
        $positionEntries = $query->getResult();
        $positionEntry = $positionEntries[0];
        $profilePositionEntry = new ProfilePositionEntry();
        $profilePositionEntry->setProfile($public);
        $profilePositionEntry->setDisplayOrder($displayOrder);
        $displayOrder++;
        $profilePositionEntry->setPositionEntry($positionEntry);
        $profilePositionEntry->setComments("Loaded by LoadProfilePositionEntryData");
        $manager->persist($profilePositionEntry);
        $manager->flush();

        $displayOrder = 0;

        $queryString = "SELECT e FROM {$class} e WHERE e.title LIKE :title AND e.description LIKE :description";
        $query = $manager->createQuery($queryString);
        $query->setParameters(array('title' => '%Teacher%', 'description' => '%DH1000%'));
        $positionEntries = $query->getResult();
        $positionEntry = $positionEntries[0];
        $profilePositionEntry = new ProfilePositionEntry();
        $profilePositionEntry->setProfile($bontouch);
        $profilePositionEntry->setDisplayOrder($displayOrder);
        $displayOrder++;
        $profilePositionEntry->setPositionEntry($positionEntry);
        $profilePositionEntry->setComments("Loaded by LoadProfilePositionEntryData");
        $manager->persist($profilePositionEntry);
        $manager->flush();

        $queryString = "SELECT e FROM {$class} e WHERE e.title LIKE :title AND e.description LIKE :description";
        $query = $manager->createQuery($queryString);
        $query->setParameters(array('title' => '%Mobile%', 'description' => '%Platsbanken%'));
        $positionEntries = $query->getResult();
        $positionEntry = $positionEntries[0];
        $profilePositionEntry = new ProfilePositionEntry();
        $profilePositionEntry->setProfile($bontouch);
        $profilePositionEntry->setDisplayOrder($displayOrder);
        $displayOrder++;
        $profilePositionEntry->setPositionEntry($positionEntry);
        $profilePositionEntry->setComments("Loaded by LoadProfilePositionEntryData");
        $manager->persist($profilePositionEntry);
        $manager->flush();

        $queryString = "SELECT e FROM {$class} e WHERE e.title LIKE :title AND e.description LIKE :description";
        $query = $manager->createQuery($queryString);
        $query->setParameters(array('title' => '%Mobile%', 'description' => '%BankID%'));
        $positionEntries = $query->getResult();
        $positionEntry = $positionEntries[0];
        $profilePositionEntry = new ProfilePositionEntry();
        $profilePositionEntry->setProfile($bontouch);
        $profilePositionEntry->setDisplayOrder($displayOrder);
        $displayOrder++;
        $profilePositionEntry->setPositionEntry($positionEntry);
        $profilePositionEntry->setComments("Loaded by LoadProfilePositionEntryData");
        $manager->persist($profilePositionEntry);
        $manager->flush();

        $displayOrder = 0;

        $queryString = "SELECT e FROM {$class} e WHERE e.title LIKE :title AND e.description LIKE :description";
        $query = $manager->createQuery($queryString);
        $query->setParameters(array('title' => '%Teacher%', 'description' => '%DD1000%'));
        $positionEntries = $query->getResult();
        $positionEntry = $positionEntries[0];
        $profilePositionEntry = new ProfilePositionEntry();
        $profilePositionEntry->setProfile($chas);
        $profilePositionEntry->setDisplayOrder($displayOrder);
        $displayOrder++;
        $profilePositionEntry->setPositionEntry($positionEntry);
        $profilePositionEntry->setComments("Loaded by LoadProfilePositionEntryData");
        $manager->persist($profilePositionEntry);
        $manager->flush();

        $queryString = "SELECT e FROM {$class} e WHERE e.title LIKE :title AND e.description LIKE :description";
        $query = $manager->createQuery($queryString);
        $query->setParameters(array('title' => '%Web%', 'description' => '%Siba%'));
        $positionEntries = $query->getResult();
        $positionEntry = $positionEntries[0];
        $profilePositionEntry = new ProfilePositionEntry();
        $profilePositionEntry->setProfile($chas);
        $profilePositionEntry->setDisplayOrder($displayOrder);
        $displayOrder++;
        $profilePositionEntry->setPositionEntry($positionEntry);
        $profilePositionEntry->setComments("Loaded by LoadProfilePositionEntryData");
        $manager->persist($profilePositionEntry);
        $manager->flush();

        $queryString = "SELECT e FROM {$class} e WHERE e.title LIKE :title AND e.description LIKE :description";
        $query = $manager->createQuery($queryString);
        $query->setParameters(array('title' => '%Web%', 'description' => '%Pensionsmyndigheten%'));
        $positionEntries = $query->getResult();
        $positionEntry = $positionEntries[0];
        $profilePositionEntry = new ProfilePositionEntry();
        $profilePositionEntry->setProfile($chas);
        $profilePositionEntry->setDisplayOrder($displayOrder);
        $displayOrder++;
        $profilePositionEntry->setPositionEntry($positionEntry);
        $profilePositionEntry->setComments("Loaded by LoadProfilePositionEntryData");
        $manager->persist($profilePositionEntry);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 14;
    }
}