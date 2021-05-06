<?php

namespace App\Repository;

use App\Entity\Mutations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mutations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mutations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mutations[]    findAll()
 * @method Mutations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MutationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mutations::class);
    }

    // /**
    //  * @return Mutations[] Returns an array of Mutations objects
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
    public function findOneBySomeField($value): ?Mutations
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
