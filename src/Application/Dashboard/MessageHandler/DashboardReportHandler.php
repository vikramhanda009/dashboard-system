<?php
namespace App\Application\Dashboard\MessageHandler;

use App\Application\Dashboard\Message\DashboardReportMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Psr\Log\LoggerInterface;

#[AsMessageHandler]
class DashboardReportHandler
{
    public function __construct(private LoggerInterface $logger) {}

    public function __invoke(DashboardReportMessage $message): void
    {
        // Simulate async processing (e.g., reporting)
        $this->logger->info('Async report generated for dashboard', [
            'dashboardId' => $message->dashboardId
        ]);
    }
}
