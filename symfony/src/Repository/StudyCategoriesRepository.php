<?php

namespace App\Repository;

use App\Entity\StudyCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudyCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudyCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudyCategories[]    findAll()
 * @method StudyCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudyCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudyCategories::class);
    }

    // /**
    //  * @return StudyCategories[] Returns an array of StudyCategories objects
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
    public function findOneBySomeField($value): ?StudyCategories
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
