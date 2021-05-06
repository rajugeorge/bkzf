<?php

namespace App\Repository;

use App\Entity\QueueTable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QueueTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method QueueTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method QueueTable[]    findAll()
 * @method QueueTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QueueTableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QueueTable::class);
    }

    // /**
    //  * @return QueueTable[] Returns an array of QueueTable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QueueTable
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function updatemultiple($condition,$value): ?QueueTable
    {
        $cnt = '';
        foreach($condition as $field=>$value){
            $cnt .= "$field => '$value'";
        }
        return $this->createQuery('UPDATE App\Entity\QueueTable SET');
    }
}
