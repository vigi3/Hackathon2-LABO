<?php

namespace App\Repository;

use App\Entity\CategoryService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoryService|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryService|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryService[]    findAll()
 * @method CategoryService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryServiceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoryService::class);
    }

    // /**
    //  * @return CategoryService[] Returns an array of CategoryService objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoryService
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
