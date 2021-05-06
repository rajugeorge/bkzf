<?php

namespace App\Repository;

use App\Entity\ReferenceStudies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReferenceStudies|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReferenceStudies|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReferenceStudies[]    findAll()
 * @method ReferenceStudies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferenceStudiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReferenceStudies::class);
    }

    // /**
    //  * @return ReferenceStudies[] Returns an array of ReferenceStudies objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReferenceStudies
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
