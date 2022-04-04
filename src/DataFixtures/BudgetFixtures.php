<?php

namespace App\DataFixtures;

use App\Entity\Budget;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BudgetFixtures extends Fixture {
    public function load(ObjectManager $manager): void {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $budget = (new Budget())
                ->setValueConsumed(0)
                ->setInitialValue($faker->randomFloat());

            $manager->persist($budget);

            $this->addReference('budget-' . $i + 1, $budget);
        }

        $manager->flush();
    }
}
