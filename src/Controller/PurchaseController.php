<?php

namespace App\Controller;

use App\Entity\JewelType;
use App\Entity\Product;
use App\Entity\Purchase;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PurchaseController extends AbstractController
{
    /**
     * @Route("/purchase/product/{typeId}/sizes", methods={"GET"})
     * @param EntityManagerInterface $em
     * @param int $typeId
     * @return JsonResponse
     */
    public function getSizeList(int $typeId, EntityManagerInterface $em)
    {
        $sizes = $em->getRepository(Purchase::class)->findSizesInPurchaseByJewelType($typeId);

        return $this->json($sizes);
    }


    /**
     * @Route("/purchase/product/styles", methods={"GET"})
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function getStyleList(EntityManagerInterface $em)
    {
        $styles = $em->getRepository(Purchase::class)->findSizesInPurchase();

        return $this->json($styles);
    }


    /**
     * @Route("/purchase/product/gems", methods={"GET"})
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function getGemsList(EntityManagerInterface $em)
    {
        $gems = $em->getRepository(Purchase::class)->findGemsInPurchase();

        return $this->json($gems);
    }
}