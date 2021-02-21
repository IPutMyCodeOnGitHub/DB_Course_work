<?php

namespace App\DataFixtures;

use App\Entity\JewelType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JewelTypeFixtures extends Fixture
{
    const JEWEL_TYPES = ["earrings", "chain", "bracelet", "necklace", "ring", "diadem", "brooch"];

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < count(self::JEWEL_TYPES); $i++){
            $jewelType = new JewelType();
            $jewelType->setName(self::JEWEL_TYPES[$i]);
            $manager->persist($jewelType);
        }

        $manager->flush();
    }
}
