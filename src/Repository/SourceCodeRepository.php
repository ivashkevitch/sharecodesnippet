<?php

namespace App\Repository;

use App\Entity\SourceCode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SourceCode|null find($id, $lockMode = null, $lockVersion = null)
 * @method SourceCode|null findOneBy(array $criteria, array $orderBy = null)
 * @method SourceCode[]    findAll()
 * @method SourceCode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SourceCodeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SourceCode::class);
    }

//    /**
//     * @return SourceCode[] Returns an array of SourceCode objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SourceCode
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
