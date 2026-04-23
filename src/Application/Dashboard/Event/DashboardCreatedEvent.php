<?php

namespace App\Application\Dashboard\Event;

class DashboardCreatedEvent
{
    public function __construct(public int $id) {}
}