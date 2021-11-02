<?php

namespace App\Repository;

use App\Entity\Ofb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ofb|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ofb|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ofb[]    findAll()
 * @method Ofb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfbRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ofb::class);
    }

    // /**
    //  * @return Ofb[] Returns an array of Ofb objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ofb
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
