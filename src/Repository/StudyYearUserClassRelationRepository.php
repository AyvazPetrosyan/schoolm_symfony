<?php

namespace App\Repository;

use App\Entity\StudyYearUserClassRelation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudyYearUserClassRelation|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudyYearUserClassRelation|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudyYearUserClassRelation[]    findAll()
 * @method StudyYearUserClassRelation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudyYearUserClassRelationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudyYearUserClassRelation::class);
    }

    // /**
    //  * @return StudyYearUserClassRelation[] Returns an array of StudyYearUserClassRelation objects
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
    public function findOneBySomeField($value): ?StudyYearUserClassRelation
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
