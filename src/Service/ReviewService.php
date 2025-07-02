<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Review;
use Doctrine\ORM\EntityRepository;

class ReviewService
{
    public function __construct()
    {
        parent::__construct();
        $this->repository = $this->entityManager->getRepository(Review::class);
    }
    public function findAll(): array
    {
        return $this->repository->findAll();
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
