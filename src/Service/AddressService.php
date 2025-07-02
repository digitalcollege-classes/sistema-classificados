<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Address;
use Doctrine\ORM\EntityRepository;

class AddressService extends AbstractService
{
    private readonly EntityRepository $repository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = $this->entityManager->getRepository(Address::class);
    }

    public function findAll(): array
    {
        return $this->repository->findAll();
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
