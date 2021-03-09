<?php

namespace App\DataFixtures;

use App\DataFixtures\GemFixtures;
use App\Entity\Gem;
use App\Entity\GemSize;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use MathPHP\Probability\Distribution\Continuous;
use MathPHP\Statistics\Distribution;

class GemSizeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $gemsCount = GemFixtures::GEMS_NAMES;
        $distributionGem = new Continuous\Gamma(1.5, 2.5);
        $distributionSize = new Continuous\Gamma(5, 1);
        $gemRepository = $manager->getRepository(Gem::class);
        $productRepository = $manager->getRepository(Product::class);

        for($i = 1; $i <= ProductFixtures::PRODUCT_COUNT; $i++){
            $gemSize = new GemSize();
            try {
                $gemId = round($distributionGem->rand());
            } catch (\Exception $e){
                $gemId = 1;
            }
            if($gemId >= count($gemsCount))
                $gemId = round($gemId/6);

            $gem = $gemRepository->find((int)$gemId);
            $gemSize->setGem($gem);

            try {
                $size = $distributionSize->rand()/5;
            } catch (\Exception $e){
                $size = 0.1;
            }
            $gemSize->setValue(round($size, 2));

            $product = $productRepository->find($i);
            $gemSize->setProduct($product);

            $manager->persist($gemSize);
        }

        $manager->flush();
    }

        public function getDependencies()
        {
            return array(
                ProductFixtures::class,
                GemFixtures::class
            );
        }
}
