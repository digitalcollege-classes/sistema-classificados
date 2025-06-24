<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Category;

class CategoryService
{
    public function findAll(): array
    {
        return [];
    }

    public function findBy(array $criteria): array
    {
        return [];
    }

    public function find(int $id): Category
    {
        return new Category();
    }

    public function update(Category $category): Category
    {
        return $category;
    }

    public function remove(int $id): void
    {
    }

    public function create(Category $category): void
    {
    }
}
