<?php

declare(strict_types=1);

namespace App\Controller\Health;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/health')]
class HealthController extends AbstractController
{
    #[Route('/database-check', name: 'database_check', methods: ['GET'])]
    public function databaseCheck(EntityManagerInterface $entityManager): JsonResponse
    {
        try {
            $connection = $entityManager->getConnection();
            $connection->fetchOne('SELECT 1');

            return $this->json([
                'database' => 'up',
                'status' => 'ok'
            ]);
        } catch (\Throwable $e) {
            return $this->json([
                'database' => 'down',
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
