<?php

namespace App\Repository;

use App\Entity\InformationAccueil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InformationAccueil|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationAccueil|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationAccueil[]    findAll()
 * @method InformationAccueil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationAccueilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InformationAccueil::class);
    }

    /*
    public function findOneBySomeField($value): ?InformationAccueil
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
