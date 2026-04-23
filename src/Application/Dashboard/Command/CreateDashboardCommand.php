<?php

namespace App\Application\Dashboard\Command;

class CreateDashboardCommand
{
    public function __construct(
        public string $title,
        public int $views
    ) {}
}