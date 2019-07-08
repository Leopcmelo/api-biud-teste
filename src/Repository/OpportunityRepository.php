<?php

namespace App\Repository;

use App\Entity\Opportunity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Opportunity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Opportunity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Opportunity[]    findAll()
 * @method Opportunity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpportunityRepository extends AbstractEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Opportunity::class);
    }

    public function getEntityClassName(): string
    {
        return Opportunity::class;
    }

}
