<?php

namespace App\DataFixtures;

use App\Entity\Project;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface {
    public function getDependencies() {
        return [
            BudgetFixtures::class,
            HighlightFixtures::class,
            StatusFixtures::class,
            TeamFixtures::class
        ];
    }

    public function load(ObjectManager $manager): void {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $project = (new Project())
                ->addHighlight($this->getReference('highlight-' . rand(1, count(JalonFixtures::NAMES))))
                ->setArchivedState($faker->boolean('0.25'))
                ->setBudget($this->getReference('budget-' . $i + 1))
                ->setClientTeam($this->getReference('team-2'))
                ->setDescription($faker->sentence())
                ->setName('Projet ' . $i + 1)
                ->setProjectTeam($this->getReference('team-1'))
                ->setStatus($this->getReference('status-' . rand(1, count(StatusFixtures::VALUES))))
                ->setStartedAt(new DateTime());

            $manager->persist($project);

            $this->addReference('project-' . $i + 1, $project);
        }

        $manager->flush();
    }
}
