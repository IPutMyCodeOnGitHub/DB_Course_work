<?php

namespace App\DataFixtures;

use App\DataFixtures\GemFixtures;
use App\Entity\Gem;
use App\Entity\GemSize;
use App\Entity\JewelType;
use App\Entity\Product;
use App\Entity\Purchase;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use MathPHP\Probability\Distribution\Continuous;
use MathPHP\Statistics\Distribution;

class PurchaseFixtures extends Fixture implements DependentFixtureInterface
{
    const PURCHASE_COUNT = 100000;

    public function load(ObjectManager $manager)
    {
        $productRepository = $manager->getRepository(Product::class);

        $jewelTypesCount = count(JewelTypeFixtures::JEWEL_TYPES);
        $jewelTypesDistribution = new Continuous\Normal((int)round($jewelTypesCount/2),1.5);

        for($i = 1; $i < self::PURCHASE_COUNT; $i++){
            $purchase = new Purchase();
            /*
            $jewelTypesId = (int)$jewelTypesDistribution->rand();//random_int(1, count(JewelTypeFixtures::JEWEL_TYPES));
            if ($jewelTypesId < 1 || $jewelTypesId > JewelTypeFixtures::JEWEL_TYPES){
                $jewelTypesId = 1;
            }*/
            $product = $productRepository->find($i);
            $purchase->setProduct($product);

            $purchase->setTotalPrice($product->getPrice());
            $hour = random_int(10, 19);
            $minute = random_int(10,59);
            $second = random_int(10,59);
            $day = random_int(1,28);
            $month = random_int(1, 12);
            $year = 2020;
            $date = DateTime::createFromFormat("d/m/Y H:i:s", "$day/$month/$year $hour:$minute:$second");
            $purchase->setDate($date);
            $manager->persist($purchase);
            if ($i % 10000 == 0) {
                $manager->flush();
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ProductFixtures::class,
        );
    }
}
