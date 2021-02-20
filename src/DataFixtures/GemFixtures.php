<?php

namespace App\DataFixtures;

use App\Entity\Gem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GemFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $gemsNames = ["diamond", "emerald", "ruby", "sapphire", "perl", "aquamarine", "amethyst", "opal"];

        for($i = 0; $i < count($gemsNames); $i++){
            $gem = new Gem();
            $gem->setName($gemsNames[$i]);
            $manager->persist($gem);
        }

        $manager->flush();
    }
}
