<?php

namespace App\Repository;

use App\Entity\UniversityHospitals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UniversityHospitals|null find($id, $lockMode = null, $lockVersion = null)
 * @method UniversityHospitals|null findOneBy(array $criteria, array $orderBy = null)
 * @method UniversityHospitals[]    findAll()
 * @method UniversityHospitals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UniversityHospitalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UniversityHospitals::class);
    }

    // /**
    //  * @return UniversityHospitals[] Returns an array of UniversityHospitals objects
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
    public function findOneBySomeField($value): ?UniversityHospitals
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
