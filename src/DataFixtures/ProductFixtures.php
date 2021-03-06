<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\JewelType;
use App\Entity\MetalAssay;
use App\Entity\Product;
use App\Entity\Style;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use MathPHP\Probability\Distribution\Continuous;
use MathPHP\Statistics\Distribution;
use MathPHP\Statistics\RandomVariable;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    const PRODUCT_COUNT = 100000;

    public function load(ObjectManager $manager)
    {
        $lowBoundJewelType = 1;
        $upBoundJewelType = count(JewelTypeFixtures::JEWEL_TYPES);
        $jewelTypeDistribution = new Continuous\Uniform($lowBoundJewelType, $upBoundJewelType);

        $stylesCount = count(StyleFixtures::STYLES_NAMES);
        $styleDistribution = new Continuous\Normal((int)round($stylesCount/2),1.5);

        $sizeDistribution = new Continuous\Normal(18,2);

        $brandsCount = count(BrandFixtures::BRAND_NAMES);
        $metalsCount = MetalAssayFixtures::ASSAY_NUMBER;

        $jewTypeRep = $manager->getRepository(JewelType::class);
        $brandRep = $manager->getRepository(Brand::class);
        $styleRep = $manager->getRepository(Style::class);
        $metalRep = $manager->getRepository(MetalAssay::class);

        for($i = 0; $i < self::PRODUCT_COUNT; $i++){
            $product = new Product();
            $product->setArticle(str_pad($i, 8, "0", STR_PAD_LEFT));

            $jewTypeId  = (int)round($jewelTypeDistribution->rand());
            $jewType = $jewTypeRep->find($jewTypeId);
            $product->setType($jewType);

            $brandId = random_int(1, $brandsCount);
            $brand = $brandRep->find($brandId);
            $product->setBrand($brand);

            $styleId = (int)$styleDistribution->rand();
            if($styleId < 1 || $styleId > $stylesCount)
                $styleId = (int)round($stylesCount/2);
            $style = $styleRep->find($styleId);
            $product->setStyle($style);

            $metalId = random_int(1, $metalsCount);
            $metal = $metalRep->find($metalId);
            $product->setMetal($metal);

            $size = $sizeDistribution->rand();
            if($size<14 || $size>22)
                $size = 17;
            $product->setSize(ceil($size/0.5) * 0.5);

            $weight = rand(2, 100);
            $product->setWeight($weight);
            $price = $weight * 10025;
            $product->setPrice($price);
            $manager->persist($product);
            if ($i % 10000 == 0) {
                $manager->flush();
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            MetalAssayFixtures::class,
            JewelTypeFixtures::class,
            BrandFixtures::class,
            StyleFixtures::class
        );
    }
}
