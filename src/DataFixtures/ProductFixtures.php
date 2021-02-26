<?php

namespace App\DataFixtures;

use App\Entity\JewelType;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use MathPHP\Probability\Distribution\Continuous;
use MathPHP\Statistics\Distribution;
use MathPHP\Statistics\RandomVariable;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $productCount = 3;
        $lowBoundJewType = 1;
        $upBoundJewType = count(JewelTypeFixtures::JEWEL_TYPES);
        $distribution = new Continuous\Uniform($lowBoundJewType, $upBoundJewType);

        for($i = 0; $i < $productCount; $i++){
            $product = new Product();
            $product->setArticle(str_pad($i, 8, "0", STR_PAD_LEFT));

            $jewTypeId  = (int)$distribution->rand();
            /** @var JewelType $jewType */
            $jewType = $manager->getRepository(JewelType::class)->find($jewTypeId);
            $product->setType($jewType);



            //$manager->persist($product);
        }

        //$manager->flush();
    }
}
