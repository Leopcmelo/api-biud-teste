<?php
declare(strict_types=1);

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

abstract class AbstractEntityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, $this->getEntityClassName());
    }

    public function save($object): void
    {
        if (!is_object($object) || false === strstr(get_class($object), $this->getClassName())) {
            $exceptionMessage = sprintf('expects %s object, %s given', $this->getClassName(), gettype($object));
            if (is_object($object)) {
                $exceptionMessage = sprintf('expects %s object, %s given', $this->getClassName(), get_class($object));
            }
            throw new \InvalidArgumentException($exceptionMessage);
        }

        $this->_em->persist($object);
        $this->_em->flush();
    }

    public function remove($object): void
    {
        $this->getEntityManager()->remove($object);
    }

    abstract public  function getEntityClassName(): string;
}