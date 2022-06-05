<?php

namespace App\Repository;

use App\Entity\FingeringPerInstrumentPitch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FingeringPerInstrumentPitch>
 *
 * @method FingeringPerInstrumentPitch|null find($id, $lockMode = null, $lockVersion = null)
 * @method FingeringPerInstrumentPitch|null findOneBy(array $criteria, array $orderBy = null)
 * @method FingeringPerInstrumentPitch[]    findAll()
 * @method FingeringPerInstrumentPitch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FingeringPerInstrumentPitchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FingeringPerInstrumentPitch::class);
    }

    public function add(FingeringPerInstrumentPitch $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(FingeringPerInstrumentPitch $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return FingeringPerInstrumentPitch[] Returns an array of FingeringPerInstrumentPitch objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FingeringPerInstrumentPitch
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
