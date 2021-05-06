<?php

namespace App\Repository;

use App\Entity\CategoryDiseases;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategoryDiseases|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryDiseases|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryDiseases[]    findAll()
 * @method CategoryDiseases[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryDiseasesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryDiseases::class);
    }

    // /**
    //  * @return CategoryDiseases[] Returns an array of CategoryDiseases objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoryDiseases
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
