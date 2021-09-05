<?php

namespace App\Repository;

use App\Entity\ManageUrl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ManageUrl|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManageUrl|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManageUrl[]    findAll()
 * @method ManageUrl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManageUrlRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ManageUrl::class);
    }

    // /**
    //  * @return ManageUrl[] Returns an array of ManageUrl objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ManageUrl
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
