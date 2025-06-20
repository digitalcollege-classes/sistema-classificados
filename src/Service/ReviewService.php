<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Review;

class ReviewService
{
    public function findAll(): array
    {
        return [];
    }

    public function findBy(array $criteria): array
    {
        return [];
    }

    public function find(int $id): Review
    {
        return new Review();
    }

    public function update(Review $review): Review
    {
        return $review;
    }

    public function remove(int $id): void
    {
    }

    public function create(Review $review): void
    {
    }
}
