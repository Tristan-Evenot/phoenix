<?php

namespace App\DataFixtures;

use App\Entity\Jalon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JalonFixtures extends Fixture {
    const NAMES = [
        1 => 'Début de la conception',
        2 => 'Fin de la conception',
        3 => 'Début des développements',
        4 => 'Fin des développements',
        5 => 'Livraison en préproduction',
        6 => 'Début de la recette',
        7 => 'Fin de la recette',
        8 => 'Livraison en production',
    ];
    public function load(ObjectManager $manager): void {
        foreach (self::NAMES as $key => $name) {
            $jalon = (new Jalon())
                ->setMandatoryState(true)
                ->setName($name)
                ->setValue($key);

            $manager->persist($jalon);

            $this->addReference('jalon-' . $key, $jalon);
        }

        $manager->flush();
    }
}
