<?php

namespace App\Repository;

use App\Entity\CategoryCompany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoryCompany|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryCompany|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryCompany[]    findAll()
 * @method CategoryCompany[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryCompanyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoryCompany::class);
    }

    // /**
    //  * @return CategoryCompany[] Returns an array of CategoryCompany objects
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
    public function findOneBySomeField($value): ?CategoryCompany
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
