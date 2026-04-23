<?php
namespace App\Infrastructure\Dashboard\EventListener;

use App\Domain\Dashboard\Event\DashboardViewedEvent;
use Psr\Log\LoggerInterface;

class DashboardViewedListener
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(DashboardViewedEvent $event): void
    {
        $this->logger->info('Dashboard viewed', [
            'dashboardId' => $event->getDashboardId(),
            'viewedAt' => $event->getViewedAt()->format('c'),
        ]);
    }
}
