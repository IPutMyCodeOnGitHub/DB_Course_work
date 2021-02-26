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
        $jewelTypes = self::JEWEL_TYPES;
        for($i = 0; $i < count($jewelTypes); $i++){
            $jewelType = new JewelType();
            $jewelType->setName($jewelTypes[$i]);
            $manager->persist($jewelType);
        }

        $manager->flush();
    }
}
