<?php

namespace App\Repository;

use App\Entity\PollsChoice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PollsChoice>
 *
 * @method PollsChoice|null find($id, $lockMode = null, $lockVersion = null)
 * @method PollsChoice|null findOneBy(array $criteria, array $orderBy = null)
 * @method PollsChoice[]    findAll()
 * @method PollsChoice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PollsChoiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PollsChoice::class);
    }

//    /**
//     * @return PollsChoice[] Returns an array of PollsChoice objects
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

//    public function findOneBySomeField($value): ?PollsChoice
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
