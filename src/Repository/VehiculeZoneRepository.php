<?php

namespace App\Repository;

use App\Entity\VehiculeZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VehiculeZone|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehiculeZone|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehiculeZone[]    findAll()
 * @method VehiculeZone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculeZoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehiculeZone::class);
    }

    // /**
    //  * @return VehiculeZone[] Returns an array of VehiculeZone objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VehiculeZone
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
