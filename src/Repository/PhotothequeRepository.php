<?php

namespace App\Repository;

use App\Entity\Phototheque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Phototheque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Phototheque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Phototheque[]    findAll()
 * @method Phototheque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotothequeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Phototheque::class);
    }

    // /**
    //  * @return Phototheque[] Returns an array of Phototheque objects
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
    public function findOneBySomeField($value): ?Phototheque
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
