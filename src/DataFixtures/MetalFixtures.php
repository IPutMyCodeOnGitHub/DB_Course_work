<?php

namespace App\DataFixtures;

use App\Entity\Metal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MetalFixtures extends Fixture
{
    const METALS_NAMES = ["gold", "silver", "platinum", "rhodium", "alloy"];

    public function load(ObjectManager $manager)
    {
        $metalsNames = self::METALS_NAMES;
        for($i = 0; $i < count($metalsNames); $i++){
            $metal = new Metal();
            $metal->setName($metalsNames[$i]);
            $manager->persist($metal);
        }

        $manager->flush();
    }
}
