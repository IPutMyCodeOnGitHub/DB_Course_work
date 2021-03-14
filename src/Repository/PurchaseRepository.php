<?php

namespace App\Repository;

use App\Entity\Purchase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Purchase|null find($id, $lockMode = null, $lockVersion = null)
 * @method Purchase|null findOneBy(array $criteria, array $orderBy = null)
 * @method Purchase[]    findAll()
 * @method Purchase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PurchaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Purchase::class);
    }

    public function findSizesInPurchaseByJewelType(int $jewelType)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('pr.id as product_id, pr.size as size')
            ->leftJoin('p.product', 'pr')
            ->andWhere('pr.type = :jewelType')
            ->setParameter('jewelType', $jewelType)
            ->orderBy('pr.id', 'ASC');

        return $qb->getQuery()->getResult();
    }

    public function findSizesInPurchase()
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('pr.id as product_id, s.name as style')
            ->leftJoin('p.product', 'pr')
            ->leftJoin('pr.style', 's')
            ->orderBy('pr.id', 'ASC');

        return $qb->getQuery()->getResult();
    }

    public function findGemsInPurchase()
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('pr.id as product_id, g.name as gem, gs.value as size')
            ->leftJoin('p.product', 'pr')
            ->leftJoin('pr.gemSize', 'gs')
            ->leftJoin('gs.gem', 'g')
            ->orderBy('pr.id', 'ASC');

        return $qb->getQuery()->getResult();
    }
}
