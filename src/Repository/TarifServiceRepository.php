<?php

namespace App\Repository;

use App\Entity\TarifService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TarifService|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifService|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifService[]    findAll()
 * @method TarifService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarifService::class);
    }

    // /**
    //  * @return TarifService[] Returns an array of TarifService objects
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
    public function findOneBySomeField($value): ?TarifService
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
