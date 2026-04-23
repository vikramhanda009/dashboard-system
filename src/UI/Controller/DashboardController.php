<?php

namespace App\UI\Controller;

use App\Application\Dashboard\Query\GetDashboardQuery;
use App\Application\Dashboard\Handler\GetDashboardHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', methods: ['GET'])]
    public function index(GetDashboardHandler $handler): JsonResponse
    {
        $data = $handler(new GetDashboardQuery());
        return $this->json($data);
    }

    #[Route('/dashboard/create', methods: ['POST'])]
    public function create(Request $request, CreateDashboardHandler $handler): JsonResponse
    {
        $handler(new CreateDashboardCommand(
            $request->get('title'),
            (int)$request->get('views')
        ));

        return $this->json(['status' => 'created']);
}
}