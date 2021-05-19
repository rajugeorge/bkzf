<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setFirstname('Firstname');
        $user->setLastname('Lastname');
        $user->setUsername('admin');
        $user->setPassword(
            $this->encoder->encodePassword($user,'admin')
        );
        $user->setEmail('admin@bzkf.com');
        $user->setRole('ROLE_ADMIN');        
        $user->setLastlogin();        
        $manager->persist($user);

        $manager->flush();
    }
}
