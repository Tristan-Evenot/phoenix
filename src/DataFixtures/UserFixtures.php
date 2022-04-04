<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture {
    public function __construct(private UserPasswordHasherInterface $hasher) {
    }

    public function load(ObjectManager $manager): void {
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $user = (new User())
                ->setEmail('user' . $i + 1 . '@gmail.com')
                ->setFirstname('Firstname' . $i + 1)
                ->setName('Name' . $i);

            $user->setPassword($this->hasher->hashPassword(
                $user,
                "azerty"
            ));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
