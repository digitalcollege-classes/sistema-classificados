<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Advertiser;

class AdvertiserService
{
    public function findAll(): array
    {
        return [];
    }

    public function findBy(array $criteria): array
    {
        return [];
    }

    public function find(int $id): Advertiser
    {
        return new Advertiser('Test Advertiser', 'teste.teste@teste.com', '123456789', '1234567890');
    }

    public function update(Advertiser $advertiser): Advertiser
    {
        return $advertiser;
    }

    public function remove(int $id): void
    {
    }

    public function create(Advertiser $advertiser): void
    {
    }
}
