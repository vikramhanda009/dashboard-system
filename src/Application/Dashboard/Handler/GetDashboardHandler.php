<?php

namespace App\Application\Dashboard\Handler;

use App\Application\Dashboard\Query\GetDashboardQuery;
use App\Domain\Dashboard\Event\DashboardViewedEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
class GetDashboardHandler
{
   public function __construct(
        private EntityManagerInterface $em,
        private CacheInterface $cache
    ) {}

    public function __invoke(GetDashboardQuery $query)
{
    return $this->cache->get("dashboard_{$query->page}", function () use ($query) {

        $start = microtime(true);

        $data = $this->em->createQuery(
            'SELECT d.id, d.title, d.views FROM App\Entity\Dashboard d'
        )
        ->setFirstResult(($query->page - 1) * $query->limit)
        ->setMaxResults($query->limit)
        ->getArrayResult();

        $end = microtime(true);
        error_log("Query time: " . ($end - $start));

        return $data;
    });
}
}