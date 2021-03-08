<?php

namespace App\Repository;

use App\Entity\UserSubjectRelation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserSubjectRelation|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSubjectRelation|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSubjectRelation[]    findAll()
 * @method UserSubjectRelation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSubjectRelationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserSubjectRelation::class);
    }

    // /**
    //  * @return UserSubjectRelation[] Returns an array of UserSubjectRelation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserSubjectRelation
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
