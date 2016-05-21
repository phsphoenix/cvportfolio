<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-22
 * Time: 15:32
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jessica\Portfolio\DataBundle\Entity\PositionEntry;

class LoadPositionEntryData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $user = $manager->getRepository('JessicaPortfolioUserBundle:PortfolioUser')->findOneBy(array('username' => 'phoenix'));
        $fullTime = $manager->getRepository('JessicaPortfolioDataBundle:PositionType')->findOneBy(array('name' => 'Full Time'));
        $organizations = $manager->getRepository('JessicaPortfolioDataBundle:Organization')->findAll();
        $now = new \DateTime();
        $start = count($organizations)-2;
        $modify = '-'.$start.' years';
        $startDate = $now->modify($modify);
        $endDate = $startDate->modify('+1 year');
        $loremIpsum = $this->container->get('apoutchika.lorem_ipsum');

        $i = 0;
        foreach($organizations as $organization) {
            $position = new PositionEntry();
            $position->setOrganization($organization);
            $position->setUser($user);
            $position->setType($fullTime);
            $position->setTitle("Team Member #".$i);
            $position->setDescription($loremIpsum->getParagraphs());
            $position->setStartDate($startDate);
            $position->setEndDate($endDate);
            $position->setComments("Loaded by LoadPositionEntryData for user".$user->getUsername());
            $startDate->modify('+1 year');
            $endDate->modify('+1 year');
            $i++;
            $manager->persist($position);
            $manager->flush();
        }

        $user = $manager->getRepository('JessicaPortfolioUserBundle:PortfolioUser')->findOneBy(array('username' => 'shadowcat'));
        $kth = $manager->getRepository('JessicaPortfolioDataBundle:Organization')->findOneBy(array('name' => 'KTH'));
        $partTime50 = $manager->getRepository('JessicaPortfolioDataBundle:PositionType')->findOneBy(array('name' => 'Part-Time 50%'));
        $cybercom = $manager->getRepository('JessicaPortfolioDataBundle:Organization')->findOneBy(array('name' => 'Cybercom'));
        $chas = $manager->getRepository('JessicaPortfolioDataBundle:Organization')->findOneBy(array('name' => 'Chas'));
        $netlight = $manager->getRepository('JessicaPortfolioDataBundle:Organization')->findOneBy(array('name' => 'Netlight'));

        $position = new PositionEntry();
        $position->setOrganization($kth);
        $position->setUser($user);
        $position->setType($partTime50);
        $position->setTitle("Teacher's Assistant");
        $position->setStartDate(new \DateTime("2005"));
        $position->setEndDate(new \DateTime("2009"));
        $description =
            "<p>Teacher's assistant for both for both undergraduate and graduate courses at KTH in programming, computer science and web development.</p>";
        $position->setDescription($description);
        $manager->persist($position);
        $manager->flush();

        $position = new PositionEntry();
        $position->setOrganization($kth);
        $position->setUser($user);
        $position->setType($partTime50);
        $position->setTitle("Teacher's Assistant");
        $position->setStartDate(new \DateTime("2005"));
        $position->setEndDate(new \DateTime("2009"));
        $description =
            "<ul>
             <li>Teacher's assistant for course DD1000 Basic Object oriented programming. Helped teach basic object oriented theory, basic algorithms, and basic program stucture using Java.</li>
             <li>Teacher's assistant for course DD1200 Programming Paradigms. Helped teach programming in various programming languages including C, C++, Go, and Scala.</li>
             <li>Teacher's assistant for course DD1300 Introduction to Algorithms. Helped teach algorithms such as divide and conquer, greedy algorithms, dymanic programming etc to students using Java and C/C++.</li>
             <li>Teacher's assistant for course DD2300 Advanced algorithms. Helped teach advanced agorithms solving problems such as the travelling salesman and the primality of integers.</li>
             </ul>";
        $position->setDescription($description);
        $manager->persist($position);
        $manager->flush();

        $position = new PositionEntry();
        $position->setOrganization($kth);
        $position->setUser($user);
        $position->setType($partTime50);
        $position->setTitle("Teacher's Assistant");
        $position->setStartDate(new \DateTime("2005"));
        $position->setEndDate(new \DateTime("2009"));
        $description =
            "<ul>
             <li>Teacher's assistant for course DH1000 Introduction to Human Computer Interaction. Helped teach basic theories around user-oriented design of graphical user interfraces.</li>
             <li>Teacher's assistant for course DD2100 Introduction to Internet Programming. Helped teach multi-tiered design of web application backends and frontends using Java EE, Node, and Python.</li>
             <li>Teacher's assistant for course DH2000 Interaction Programming. Helped teach multi-tierd design of web frontends using Knockout.js, jQuery, and jQuery-UI.</li>
             <li>Teacher's assistant for course DH2300 Mobile Programming. Helped teach basic mobile application design using Objective-C and Java.</li>
             </ul>";
        $position->setDescription($description);
        $manager->persist($position);
        $manager->flush();

        $position = new PositionEntry();
        $position->setOrganization($netlight);
        $position->setUser($user);
        $position->setType($fullTime);
        $position->setTitle("Junior Software Developer");
        $position->setStartDate(new \DateTime("2009"));
        $position->setEndDate(new \DateTime("2012"));
        $description =
            "<p>Developed client solutions using both web and mobile app technologies.</p>";
        $position->setDescription($description);
        $manager->persist($position);
        $manager->flush();

        $position = new PositionEntry();
        $position->setOrganization($netlight);
        $position->setUser($user);
        $position->setType($fullTime);
        $position->setTitle("Web Developer");
        $position->setStartDate(new \DateTime("2009"));
        $position->setEndDate(new \DateTime("2012"));
        $description =
            "<ul>
             <li>Developed Frontend for internal intranet tool för Länsförsäkringar using AngularJS</li>
             <li>Worked on backend in Python for a web game for Siba to teach people about clean water and environmental awareness in the third world</li>
             <li>Helped modernize a legacy web project at Arbetsförmedlingen, converting a PHP application into a C# ASP.net Application.</li>
             </ul>";
        $position->setDescription($description);
        $manager->persist($position);
        $manager->flush();

        $position = new PositionEntry();
        $position->setOrganization($netlight);
        $position->setUser($user);
        $position->setType($fullTime);
        $position->setTitle("Mobile App Developer");
        $position->setStartDate(new \DateTime("2009"));
        $position->setEndDate(new \DateTime("2012"));
        $description =
            "<ul>
             <li>Worked on a project writing the app Platsbanken for AMS for both iOS and Android platforms.</li>
             <li>Worked on a project writing the app \"Sjukdomskollen\" for both iOS and Android platforms for Vårdguiden.se</li>
             </ul>";
        $position->setDescription($description);
        $manager->persist($position);
        $manager->flush();

        $position = new PositionEntry();
        $position->setOrganization($cybercom);
        $position->setUser($user);
        $position->setType($fullTime);
        $position->setTitle("Senior Software Developer");
        $position->setStartDate(new \DateTime("2012"));
        $position->setEndDate(new \DateTime("2016"));
        $description =
            "<p>Major responsibilities in projects using web and mobile app technologies.</p>";
        $position->setDescription($description);
        $manager->persist($position);
        $manager->flush();

        $position = new PositionEntry();
        $position->setOrganization($cybercom);
        $position->setUser($user);
        $position->setType($fullTime);
        $position->setTitle("Web Developer");
        $position->setStartDate(new \DateTime("2012"));
        $position->setEndDate(new \DateTime("2016"));
        $description =
            "<ul>
             <li>Development of backend for a major ERP tool in ASP.net VB.net for Länsförsäkringar</li>
             <li>Architect for a major backend for Pensionsmyndigheten written in Java Spring</li>
             </ul>";
        $position->setDescription($description);
        $manager->persist($position);
        $manager->flush();

        $position = new PositionEntry();
        $position->setOrganization($cybercom);
        $position->setUser($user);
        $position->setType($fullTime);
        $position->setTitle("Mobile App Developer");
        $position->setStartDate(new \DateTime("2012"));
        $position->setEndDate(new \DateTime("2016"));
        $description =
            "<ul>
             <li>External consultant on the mobile version of the SEB internet bank for both Android and iOS</li>
             <li>Lead developer for both the Android and iOS versions of the BankID application</li>
             </ul>";
        $position->setDescription($description);
        $manager->persist($position);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 8;
    }
}