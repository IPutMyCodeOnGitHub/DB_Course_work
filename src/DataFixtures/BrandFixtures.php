<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $brandsNames = ["Swarovski", "Van Cleef & Arpels", "BVLGARI", "Cartier", "Tiffani & Co", "Chopard"];

        for($i = 0; $i < count($brandsNames); $i++){
            $brand= new Brand();
            $brand->setName($brandsNames[$i]);
            $manager->persist($brand);
        }

        $manager->flush();
    }
}
