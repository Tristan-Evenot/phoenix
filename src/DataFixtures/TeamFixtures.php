<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Team;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TeamFixtures extends Fixture implements DependentFixtureInterface {
    public function getDependencies() {
        return [
            UserFixtures::class
        ];
    }
    public function load(ObjectManager $manager): void {
        $team = (new Team())
            ->addMember($this->getReference('user-1'))
            ->addMember($this->getReference('user-2'))
            ->addMember($this->getReference('user-3'))
            ->addMember($this->getReference('user-4'))
            ->addMember($this->getReference('user-5'))
            ->setName('Équipe 1')
            ->setManager($this->getReference('user-1'));

        $manager->persist($team);

        $this->addReference('team-1', $team);

        $team = (new Team())
            ->addMember($this->getReference('user-6'))
            ->addMember($this->getReference('user-7'))
            ->addMember($this->getReference('user-8'))
            ->addMember($this->getReference('user-9'))
            ->addMember($this->getReference('user-10'))
            ->setName('Équipe 2')
            ->setManager($this->getReference('user-6'));

        $manager->persist($team);

        $this->addReference('team-2', $team);


        $manager->flush();
    }
}
