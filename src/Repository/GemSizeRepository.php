<?php

namespace App\Repository;

use App\Entity\GemSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GemSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method GemSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method GemSize[]    findAll()
 * @method GemSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GemSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GemSize::class);
    }

    // /**
    //  * @return GemSize[] Returns an array of GemSize objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GemSize
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
