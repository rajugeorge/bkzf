<?php

namespace App\Repository;

use App\Entity\DiagnosesCodeIcd10;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DiagnosesCodeIcd10|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiagnosesCodeIcd10|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiagnosesCodeIcd10[]    findAll()
 * @method DiagnosesCodeIcd10[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiagnosesCodeIcd10Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiagnosesCodeIcd10::class);
    }

    // /**
    //  * @return DiagnosesCodeIcd10[] Returns an array of DiagnosesCodeIcd10 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DiagnosesCodeIcd10
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
