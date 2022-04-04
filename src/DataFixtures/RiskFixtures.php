<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Risk;
use DateTime;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RiskFixtures extends Fixture implements DependentFixtureInterface {
    public function getDependencies() {
        return [
            ProjectFixtures::class
        ];
    }
    public function load(ObjectManager $manager): void {
        for ($i = 0; $i < 10; $i++) {
            $risk = (new Risk())
                ->setIdentificationDate(new DateTime())
                ->setName('Risque ' . $i + 1)
                ->setProbability(string::random())
                ->setProject($this->getReference('project-' . $i + 1))
                ->setSolvedDate(new DateTime())
                ->setSeverity(string::random());

            $manager->persist($risk);

            $this->addReference('risk-' . $i + 1, $risk);
        }
        $manager->flush();
    }
}
