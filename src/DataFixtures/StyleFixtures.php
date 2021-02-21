<?php

namespace App\DataFixtures;

use App\Entity\Style;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StyleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $stylesNames = ["minimalism", "classic", "modern", "vintage", "ethnic", "baroque"];

        for($i = 0; $i < count($stylesNames); $i++){
            $style = new Style();
            $style->setName($stylesNames[$i]);
            $manager->persist($style);
        }

        $manager->flush();
    }
}