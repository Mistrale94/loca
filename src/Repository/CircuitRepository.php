<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Circuit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Circuit>
 *
 * @method Circuit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Circuit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Circuit[]    findAll()
 * @method Circuit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CircuitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Circuit::class);
    }

    /**
     * @return Circuit[]
     */
    public function findSearch(SearchData $search): array
    {
        $query = $this
            ->createQueryBuilder('c')
            ->select('f', 'c')
            ->join('c.filter', 'f');

        if(!empty($search->filters)){
            $query = $query
                ->andWhere('f.id IN (:filter)')
                ->setParameters('filter', $search->filters);
        }

        return $query->getQuery()->getResult();
    }

    public function add(Circuit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Circuit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Circuit[] Returns an array of Circuit objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Circuit
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
