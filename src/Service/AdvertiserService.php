<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Advertiser;

class AdvertiserService extends AbstractService
{
    public function findAll(): array
    {
        $repository = $this->entityManager->getRepository(Advertiser::class);

        return $repository->findAll();
    }

    public function findBy(array $criteria): array
    {
        $repository = $this->entityManager->getRepository(Advertiser::class);

        return $repository->findBy($criteria);
    }

    public function find(int $id): ?Advertiser
    {
        $repository = $this->entityManager->getRepository(Advertiser::class);

        return $repository->find($id);
    }

    public function update(Advertiser $advertiser): Advertiser
    {
        $this->entityManager->persist($advertiser);
        $this->entityManager->flush();

        return $advertiser;
    }

    public function remove(int $id): void
    {
        $advertiser = $this->find($id);
        if ($advertiser) {
            $this->entityManager->remove($advertiser);
            $this->entityManager->flush();
        }
    }

    public function create(Advertiser $advertiser): void
    {
        $this->entityManager->persist($advertiser);
        $this->entityManager->flush();
    }
}
