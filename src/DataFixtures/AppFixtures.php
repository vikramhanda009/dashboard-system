<?php

namespace App\DataFixtures;

use App\Entity\Dashboard;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 100000; $i++) {

            $manager->persist(
                new Dashboard("Title $i", rand(1, 1000))
            );

            // ✅ CRITICAL: flush in batches
            if ($i % 500 === 0) {
                $manager->flush();
                $manager->clear(); // frees memory
            }
        }

        $manager->flush();
    }
}