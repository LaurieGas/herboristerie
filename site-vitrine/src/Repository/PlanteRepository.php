<?php

namespace App\Repository;

use App\Entity\Plante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Plante|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plante|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plante[]    findAll()
 * @method Plante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plante::class);
    }

    // requête pour afficher le nombre de plantes
    /**
     * @return Plante[] Returns an array of Plante objects
     */
    public function countAllPlantes()
    {
        $queryBuilder =  $this->createQueryBuilder('a');
        $queryBuilder->select('COUNT(a.id) as value');

        return $queryBuilder->getQuery()->getResult();

    }

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
    public function findOneBySomeField($value): ?Plante
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
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
    // public function countAllPlantes()
    // {
    //     $queryBuilder = $this->createQueryBuilder('a');
    //     $queryBuilder->select('COUNT(a.id) as value');

    //     return $queryBuilder->getQuery()->getOneOrNullResult();
    // }

}
