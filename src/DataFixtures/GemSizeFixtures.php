<?php

namespace App\DataFixtures;

use App\DataFixtures\GemFixtures;
use App\Entity\Gem;
use App\Entity\GemSize;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use MathPHP\Probability\Distribution\Continuous;
use MathPHP\Statistics\Distribution;

class GemSizeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $gemSizeCount = 100000;
        $gemsCount = GemFixtures::GEMS_NAMES;
        $distributionGem = new Continuous\Gamma(1.5, 2.5);
        $distributionSize = new Continuous\Gamma(5, 1);
        $gemRepository = $manager->getRepository(Gem::class);

        for($i = 0; $i < $gemSizeCount; $i++){
            $gemSize = new GemSize();
            try {
                $gemId = (int)$distributionGem->rand();
            } catch (\Exception $e){
                $gemId = 0;
            }
            if($gemId >= count($gemsCount))
                $gemId = (int)$gemId/5;
            $gem = $gemRepository->find($gemId);
            $gemSize->setGem($gem);

            try {
                $size = $distributionSize->rand()/5;
            } catch (\Exception $e){
                $size = 0.1;
            }
            $gemSize->setValue($size);

            //set Product

            $manager->persist($gemSize);
        }

        $manager->flush();
    }
}
