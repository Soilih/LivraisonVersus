<?php

namespace App\Repository;

use App\Entity\TarifVehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TarifVehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifVehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifVehicule[]    findAll()
 * @method TarifVehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifVehiculeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarifVehicule::class);
    }

    // /**
    //  * @return TarifVehicule[] Returns an array of TarifVehicule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TarifVehicule
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
