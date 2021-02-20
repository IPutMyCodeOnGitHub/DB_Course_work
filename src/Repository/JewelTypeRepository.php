<?php

namespace App\Repository;

use App\Entity\JewelType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JewelType|null find($id, $lockMode = null, $lockVersion = null)
 * @method JewelType|null findOneBy(array $criteria, array $orderBy = null)
 * @method JewelType[]    findAll()
 * @method JewelType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JewelTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JewelType::class);
    }

    // /**
    //  * @return JewelType[] Returns an array of JewelType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JewelType
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
