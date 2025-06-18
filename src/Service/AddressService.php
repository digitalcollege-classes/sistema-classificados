<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Address;

class AddressService
{
    public function findAll(): array
    {
        return [];
    }

    public function findBy(array $criteria): array
    {
        return [];
    }

    public function find(int $id): Address
    {
        return new Address();
    }

    public function update(Address $address): Address
    {
        return $address;
    }

    public function remove(int $id): void
    {
    }

    public function create(Address $address): void
    {
    }
}
