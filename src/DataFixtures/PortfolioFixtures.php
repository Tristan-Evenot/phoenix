<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Portfolio;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PortfolioFixtures extends Fixture implements DependentFixtureInterface {
    public function getDependencies() {
        return [
            ProjectFixtures::class,
            UserFixtures::class
        ];
    }
    public function load(ObjectManager $manager): void {
        $porfolio = (new Portfolio())
            ->addProjet($this->getReference('project-1'))
            ->addProjet($this->getReference('project-2'))
            ->addProjet($this->getReference('project-3'))
            ->addProjet($this->getReference('project-4'))
            ->addProjet($this->getReference('project-5'))
            ->setManager($this->getReference('user-1'))
            ->setName('Portefeuille 1');

        $manager->persist($porfolio);

        $porfolio = (new Portfolio())
            ->addProjet($this->getReference('project-6'))
            ->addProjet($this->getReference('project-7'))
            ->addProjet($this->getReference('project-8'))
            ->addProjet($this->getReference('project-9'))
            ->addProjet($this->getReference('project-10'))
            ->setManager($this->getReference('user-6'))
            ->setName('Portefeuille 2');

        $manager->persist($porfolio);

        $manager->flush();
    }
}
