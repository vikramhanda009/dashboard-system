<?php
namespace App\Application\Dashboard\Message;

class DashboardReportMessage
{
    public function __construct(
        public readonly int $dashboardId
    ) {}
}
    