<?php

namespace App\Repository;

use App\Entity\TitleAm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TitleAm|null find($id, $lockMode = null, $lockVersion = null)
 * @method TitleAm|null findOneBy(array $criteria, array $orderBy = null)
 * @method TitleAm[]    findAll()
 * @method TitleAm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TitleAmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TitleAm::class);
    }

    // /**
    //  * @return TitleAm[] Returns an array of TitleAm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TitleAm
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
