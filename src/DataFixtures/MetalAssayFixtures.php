<?php

namespace App\DataFixtures;

use App\Entity\Metal;
use App\Entity\MetalAssay;
use App\DataFixtures\MetalFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Config\Definition\Builder\MergeBuilder;

class MetalAssayFixtures extends Fixture implements DependentFixtureInterface
{
    const ASSAY_NUMBER = 7;

    public function load(ObjectManager $manager)
    {
        $gold = $manager->getRepository(Metal::class)->findOneBy(["name" => "gold"]);
        $assay = new MetalAssay(1, $gold, 750);
        $manager->persist($assay);
        $assay = new MetalAssay(2, $gold, 585);
        $manager->persist($assay);

        $silver = $manager->getRepository(Metal::class)->findOneBy(["name" => "silver"]);
        $assay = new MetalAssay(3, $silver, 925);
        $manager->persist($assay);
        $assay = new MetalAssay(4, $silver, 960);
        $manager->persist($assay);

        $platinum = $manager->getRepository(Metal::class)->findOneBy(["name" => "platinum"]);
        $assay = new MetalAssay(5, $platinum, 900);
        $manager->persist($assay);
        $assay = new MetalAssay(6, $platinum, 950);
        $manager->persist($assay);

        $alloy = $manager->getRepository(Metal::class)->findOneBy(["name" => "alloy"]);
        $assay = new MetalAssay(7, $alloy, null);
        $manager->persist($assay);


        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            MetalFixtures::class
        );
    }
}
