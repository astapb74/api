<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    public function findByTitle($title)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.title = :val')
            ->setParameter('val', "%$title%")
            ->andWhere('a.deleted_at IS NULL')
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    
    public function findOneById($id): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.id = :val')
            ->setParameter('val', $id)
            ->andWhere('a.deleted_at IS NULL')
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findList()
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.deleted_at IS NULL')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    
}
