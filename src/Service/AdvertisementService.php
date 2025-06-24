<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Advertisement;

class AdvertisementService
{
    public function findAll(): array
    {
        return [];
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
