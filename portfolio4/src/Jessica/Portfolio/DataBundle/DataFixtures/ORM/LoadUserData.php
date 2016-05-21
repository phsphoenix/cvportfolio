<?php
/**
 * Created by IntelliJ IDEA.
 * User: dracarys
 * Date: 2016-04-17
 * Time: 18:15
 */

namespace Jessica\Portfolio\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $user = $userManager->createUser();
        $user->setUsername('dracarys');
        $user->setEmail('pdt.james.huang@gmail.com');
        $user->setPlainPassword('starfire');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_SUPER_ADMIN'));
        $userManager->updateUser($user, true);

        $user = $userManager->createUser();
        $user->setUsername('phoenix');
        $user->setEmail('jean.grey.vine.heartstring@gmail.com');
        $user->setPlainPassword('jean');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));
        $userManager->updateUser($user, true);

        $user = $userManager->createUser();
        $user->setUsername('shadowcat');
        $user->setEmail('kitty.pryde.vine.heartstring@gmail.com');
        $user->setPlainPassword('kitty');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));
        $userManager->updateUser($user, true);
    }

    public function getOrder() {
        return 1;
    }
}