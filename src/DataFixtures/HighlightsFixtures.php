<?php

namespace App\DataFixtures;

use App\Entity\Highlights;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HighlightsFixtures extends Fixture implements DependentFixtureInterface {
    public function getDependencies() {
        return [
            JalonFixtures::class
        ];
    }
    public function load(ObjectManager $manager): void {
        $faker = \Faker\Factory::create('fr_FR');

        foreach (JalonFixtures::NAMES as $key => $name) {
            $highlight = (new Highlights())
                ->setDate(new DateTime())
                ->setDescription($faker->sentence())
                ->setJalon($this->getReference('jalon-' . $key))
                ->setName('Fait marquant ' . $key);

            $manager->persist($highlight);

            $this->addReference('highlight-' . $key, $highlight);
        }
        $manager->flush();
    }
}
