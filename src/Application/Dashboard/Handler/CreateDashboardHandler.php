<?php

namespace App\Application\Dashboard\Handler;

use App\Application\Dashboard\Command\CreateDashboardCommand;
use App\Domain\Dashboard\Entity\Dashboard;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use App\Application\Dashboard\Event\DashboardCreatedEvent;

class CreateDashboardHandler
{
    // public function __construct(private EntityManagerInterface $em, private EventDispatcherInterface $eventDispatcher) {}
    public function __construct(
            private EntityManagerInterface $em,
            private EventDispatcherInterface $eventDispatcher
        ) {}
    public function __invoke(CreateDashboardCommand $command)
    {
        $dashboard = new Dashboard($command->title, $command->views);
        $this->em->persist($dashboard);
        $this->em->flush();
        $this->eventDispatcher->dispatch(
            new DashboardCreatedEvent($dashboard->getId())
        );
        
    }
}