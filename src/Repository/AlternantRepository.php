<?php

namespace App\Repository;

use App\Entity\Alternant;
use App\Entity\Offre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Alternant>
 */
class AlternantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Alternant::class);
    }
// Méthode pour trouver les alternants ayant postulé à une offre
    public function findByOffre(Offre $offre)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.offre = :offre')
            ->setParameter('offre', $offre)
            ->getQuery()
            ->getResult();
    }
}
