<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\AdvertiserPlan;

class AdvertiserPlanService
{
    public function findAll(): array
    {
        return [];
    }

    public function findBy(array $criteria): array
    {
        return [];
    }

    public function find(int $id): AdvertiserPlan
    {
        return new AdvertiserPlan();
    }

    public function update(AdvertiserPlan $advertiserPlan): AdvertiserPlan
    {
        return $advertiserPlan;
    }

    public function remove(int $id): void
    {
    }

    public function create(AdvertiserPlan $advertiserPlan): void
    {
    }
}
