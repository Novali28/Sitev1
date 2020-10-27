<?php

namespace App\Repository;

use App\Entity\Ennemi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ennemi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ennemi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ennemi[]    findAll()
 * @method Ennemi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnnemiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ennemi::class);
    }

    // /**
    //  * @return Ennemi[] Returns an array of Ennemi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ennemi
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
