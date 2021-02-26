<?php

namespace App\DataFixtures;

use App\Entity\Gem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GemFixtures extends Fixture
{
    const GEMS_NAMES = ["aquamarine", "perl", "diamond", "amethyst", "opal", "emerald", "ruby", "sapphire"];

    public function load(ObjectManager $manager)
    {
        $gemsNames = self::GEMS_NAMES;
        for($i = 0; $i < count($gemsNames); $i++){
            $gem = new Gem();
            $gem->setName($gemsNames[$i]);
            $manager->persist($gem);
        }

        $manager->flush();
    }
}
