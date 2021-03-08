<?php

namespace App\Repository;

use App\Entity\ClassHour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClassHour|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassHour|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassHour[]    findAll()
 * @method ClassHour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassHourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassHour::class);
    }

    // /**
    //  * @return ClassHour[] Returns an array of ClassHour objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ClassHour
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
