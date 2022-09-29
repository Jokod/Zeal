<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setName('admin')
             ->setEmail('admin@admin.com')
             ->setRoles(['ROLE_ADMIN'])
             ->setCreatedAt()
        ;

        $encodedPassword = $this->userPasswordHasher->hashPassword($admin, 'admin');
        $admin->setPassword($encodedPassword);

        $manager->persist($admin);
        $manager->flush();
    }
}
