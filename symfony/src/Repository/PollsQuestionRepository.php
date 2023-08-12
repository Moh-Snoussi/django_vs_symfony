<?php

namespace App\Repository;

use App\Entity\PollsQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PollsQuestion>
 *
 * @method PollsQuestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method PollsQuestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method PollsQuestion[]    findAll()
 * @method PollsQuestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PollsQuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PollsQuestion::class);
    }

//    /**
//     * @return PollsQuestion[] Returns an array of PollsQuestion objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PollsQuestion
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
