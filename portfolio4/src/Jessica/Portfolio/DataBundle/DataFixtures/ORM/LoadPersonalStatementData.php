<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-23
 * Time: 23:03
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jessica\Portfolio\DataBundle\Entity\PersonalStatement;

class LoadPersonalStatementData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $loremIpsum = $this->container->get('apoutchika.lorem_ipsum');

        $statement = new PersonalStatement();
        $statement->setUser($user);
        $statement->setName("Statement1");
        $statement->setContents($loremIpsum->getParagraphs(5));
        $statement->setComments("Loaded by LoadPersonalStatementData");
        $manager->persist($statement);
        $manager->flush($statement);

        $statement = new PersonalStatement();
        $statement->setUser($user);
        $statement->setName("Statement2");
        $statement->setContents($loremIpsum->getParagraphs(10));
        $statement->setComments("Loaded by LoadPersonalStatementData");
        $manager->persist($statement);
        $manager->flush($statement);

        $user = $manager->getRepository('JessicaPortfolioUserBundle:PortfolioUser')->findOneBy(array('username' => 'shadowcat'));

        $statement = new PersonalStatement();
        $statement->setUser($user);
        $statement->setName("General");
        $contents = "
        <p>I am a senior software developer with extensive experience in both web and mobile appplication technologies. I am constantly looking for new challanges and to understand and apply new technologies.</p>";
        $statement->setContents($contents);
        $statement->setComments("Loaded by LoadPersonalStatementData");
        $manager->persist($statement);
        $manager->flush($statement);

        $statement = new PersonalStatement();
        $statement->setUser($user);
        $statement->setName("Chas");
        $contents = "
        <p>Dear Tove,</p>
        <p>My name is Kitty Pryde and I am currenly in my 4th year at Cybercom. I've worked across various industries and with some very big clients, and I believe it is time for me
        to move on to another company to further my career in web development.</p>
        <p>I have extensive experience primarily with backend technologies across several backend languages. I am senior in Java, and C# .NET and I have extensive experience in
        developing scalable backend solutions for mission critical systems.</p>
        <p>I specialize in setting up scalable backend architectures, using microservices, load balancing, and extensive caching to achieve high availability.</p>
        <p>I am an expert at continuous integration, and in setting up fast and sustainable release cycles for the most demanding business deadlines.</p>
        <p>As a person I am very organized, easy going, and I am a team player.</p>
        <p>During my free time I do martial arts, I travel, and I spend a lot of time with my boyfriend and family.</p>
        <p>I am eager to meet you, and hope that you can make time for an interview.</p>
        <p>Sincerley, </p>
        <p>Kitty Pryde</p>";
        $statement->setContents($contents);
        $statement->setComments("Loaded by LoadPersonalStatementData");
        $manager->persist($statement);
        $manager->flush($statement);

        $statement = new PersonalStatement();
        $statement->setUser($user);
        $statement->setName("BonTouch");
        $contents = "
        <p>Dear Margareta,</p>
        <p>My name is Kitty Pryde and I am currently in my 4th year at Cybercom. I've worked on mobile development across various industries and with some very big clients, and 
        I blieve it is time for me to move on to pure mobile app development company to further my interests in app development.</p>
        <p>I have extensive experience with both iOS and Android, having worked with some very big names both at Netlight and at my current employer Cybercom.</p>
        <p>I have worked with mobile app development since the very beginning, and over the years I have worked with some especially tricky cases.</p>
        <p>I have experience with both native applications and cross-platform frameworks, and I am currently hard at work trying to learn the newest cross platform framework, Xamarin.</p>
        <p>As a person I am very organized, creative, easy going and a good team player.</p>
        <p>During my free time I like to do martial arts, travel, and spend a lot of time with my boyfriend and family.</p>
        <p>I am eager to meet you and discuss how I can make a contribution to Bontouch.</p>
        <p>Sincerely, </p>
        <p>Kitty Pryde</p>";
        $statement->setContents($contents);
        $statement->setComments("Loaded by LoadPersonalStatementData");
        $manager->persist($statement);
        $manager->flush($statement);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 9;
    }
}