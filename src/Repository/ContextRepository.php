<?php declare(strict_types=1);

namespace Stringkey\MetadataCoreBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Stringkey\MetadataCoreBundle\Entity\Context;

class ContextRepository extends ServiceEntityRepository
{
    public const ALIAS = 'context';
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Context::class);
    }

    public function getQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder(self::ALIAS);
    }

    public function findByName(string $name): ?Context
    {
        $queryBuilder = $this->getQueryBuilder();

        self::addNameFilter($queryBuilder, $name);

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    public static function addNameFilter(QueryBuilder $queryBuilder, string $name): void
    {
        $queryBuilder->andWhere(self::ALIAS . '.name = :name');
        $queryBuilder->setParameter('name', $name);
    }
}
