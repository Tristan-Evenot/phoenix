<?php

namespace App\DataFixtures;

use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatusFixtures extends Fixture {
    const VALUES = [
        'waiting' => 'Waiting',
        'inProgress' => 'In progress',
        'done' => 'Done'
    ];

    public function load(ObjectManager $manager): void {
        foreach (self::VALUES as $key => $value) {
            $status = (new Status())
                ->setName($key)
                ->setSlug($key)
                ->setValue($value);

            $manager->persist($status);

            $this->addReference('status-' . $key, $status);
        }

        $manager->flush();
    }
}
