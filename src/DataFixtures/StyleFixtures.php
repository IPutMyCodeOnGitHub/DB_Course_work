<?php

namespace App\DataFixtures;

use App\Entity\Style;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StyleFixtures extends Fixture
{
    const STYLES_NAMES = ["ethnic", "modern", "minimalism", "classic", "vintage", "baroque", "gothic"];

    public function load(ObjectManager $manager)
    {
        $stylesNames = self::STYLES_NAMES;
        for($i = 0; $i < count($stylesNames); $i++){
            $style = new Style();
            $style->setName($stylesNames[$i]);
            $manager->persist($style);
        }

        $manager->flush();
    }
}
