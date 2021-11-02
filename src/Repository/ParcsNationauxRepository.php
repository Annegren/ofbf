<?php

namespace App\Repository;

use App\Entity\ParcsNationaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParcsNationaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParcsNationaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParcsNationaux[]    findAll()
 * @method ParcsNationaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParcsNationauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParcsNationaux::class);
    }

    // /**
    //  * @return ParcsNationaux[] Returns an array of ParcsNationaux objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParcsNationaux
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
