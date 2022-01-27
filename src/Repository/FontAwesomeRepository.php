<?php

namespace App\Repository;

use App\Entity\FontAwesome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FontAwesome|null find($id, $lockMode = null, $lockVersion = null)
 * @method FontAwesome|null findOneBy(array $criteria, array $orderBy = null)
 * @method FontAwesome[]    findAll()
 * @method FontAwesome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FontAwesomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FontAwesome::class);
    }

    // /**
    //  * @return FontAwesome[] Returns an array of FontAwesome objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FontAwesome
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
