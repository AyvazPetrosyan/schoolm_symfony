<?php

namespace App\Repository;

use App\Entity\SClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method SClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method SClass[]    findAll()
 * @method SClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SClass::class);
    }

    // /**
    //  * @return SClass[] Returns an array of SClass objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SClass
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
