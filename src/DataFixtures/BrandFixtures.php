<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    const BRAND_NAMES = ["Swarovski", "Van Cleef & Arpels", "BVLGARI", "Cartier", "Tiffani & Co", "Chopard"];

    public function load(ObjectManager $manager)
    {
        $brandsNames = self::BRAND_NAMES;
        for($i = 0; $i < count($brandsNames); $i++){
            $brand= new Brand();
            $brand->setName($brandsNames[$i]);
            $manager->persist($brand);
        }

        $manager->flush();
    }
}
