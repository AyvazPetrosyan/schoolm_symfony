<?php

namespace App\Repository;

use App\Entity\StadyYear;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StadyYear|null find($id, $lockMode = null, $lockVersion = null)
 * @method StadyYear|null findOneBy(array $criteria, array $orderBy = null)
 * @method StadyYear[]    findAll()
 * @method StadyYear[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StadyYearRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StadyYear::class);
    }

    // /**
    //  * @return StadyYear[] Returns an array of StadyYear objects
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
    public function findOneBySomeField($value): ?StadyYear
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
