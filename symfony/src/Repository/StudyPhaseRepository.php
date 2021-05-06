<?php

namespace App\Repository;

use App\Entity\StudyPhase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudyPhase|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudyPhase|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudyPhase[]    findAll()
 * @method StudyPhase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudyPhaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudyPhase::class);
    }

    // /**
    //  * @return StudyPhase[] Returns an array of StudyPhase objects
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
    public function findOneBySomeField($value): ?StudyPhase
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
