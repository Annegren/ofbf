<?php

namespace App\Repository;

use App\Entity\PermanentArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PermanentArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method PermanentArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method PermanentArticle[]    findAll()
 * @method PermanentArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PermanentArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PermanentArticle::class);
    }

    // /**
    //  * @return PermanentArticle[] Returns an array of PermanentArticle objects
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
    public function findOneBySomeField($value): ?PermanentArticle
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
