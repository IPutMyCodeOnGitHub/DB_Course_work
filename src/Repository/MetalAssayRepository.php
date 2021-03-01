<?php

namespace App\Repository;

use App\Entity\MetalAssay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MetalAssay|null find($id, $lockMode = null, $lockVersion = null)
 * @method MetalAssay|null findOneBy(array $criteria, array $orderBy = null)
 * @method MetalAssay[]    findAll()
 * @method MetalAssay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetalAssayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MetalAssay::class);
    }

    // /**
    //  * @return MetalAssay[] Returns an array of MetalAssay objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MetalAssay
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
