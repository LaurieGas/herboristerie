<?php

namespace App\Repository;

use App\Entity\Tisane;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tisane|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tisane|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tisane[]    findAll()
 * @method Tisane[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TisaneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tisane::class);
    }

    // requête pour afficher le nombre de tisanes
    /**
    * @return Tisane[] Returns an array of Tisane objects
    */
    public function countAllTisanes()
    {
        $queryBuilder =  $this->createQueryBuilder('a');
        $queryBuilder->select('COUNT(a.id) as value');

        return $queryBuilder->getQuery()->getResult();

    }

    // /**
    //  * @return Tisane[] Returns an array of Tisane objects
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
    public function findOneBySomeField($value): ?Tisane
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    // /**
    //  * @return int|mixed|string|null
    //  * @throws \Doctrine\ORM\NonUniqueResultException
    //  */
    // public function countAllTisanes()
    // {
    //     $queryBuilder = $this->createQueryBuilder('a');
    //     $queryBuilder->select('COUNT(a.id) as value');

    //     return $queryBuilder->getQuery()->getOneOrNullResult();
    // }

}
