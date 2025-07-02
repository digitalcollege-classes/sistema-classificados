<?php

declare(strict_types=1);

namespace App\Service;

use App\Connection\DatabaseConnection;
use App\Entity\Advertisement;

class AdvertisementService extends AbstractService
{
    public function findAll(): array
    {
        $entityManager = (new DatabaseConnection)->getEntityManager();

        $repository = $entityManager->getRepository(Advertisement::class);

        return $repository->findAll();
    }

    public function findBy(array $criteria): array
    {
        return [];
    }

    public function find(int $id): Advertisement
    {
        return new Advertisement(0, 0, '');
    }

    public function update(Advertisement $advertisement): Advertisement
    {
        return $advertisement;
    }

    public function remove(int $id): void
    {
    }

    public function create(Advertisement $advertisement): void
    {
    }
}
