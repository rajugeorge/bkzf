<?php

namespace App\Repository;

use App\Entity\StudyLocations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudyLocations|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudyLocations|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudyLocations[]    findAll()
 * @method StudyLocations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudyLocationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudyLocations::class);
    }

    // /**
    //  * @return StudyLocations[] Returns an array of StudyLocations objects
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
    public function findOneBySomeField($value): ?StudyLocations
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
