<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Category;
use Doctrine\ORM\EntityRepository;

class CategoryService extends AbstractService
{
    private readonly EntityRepository $repository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = $this->entityManager->getRepository(Category::class);
    }

    public function findAll(): array
    {
        return $this->repository->findAll();
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
        $this->entityManager->persist($category);
        $this->entityManager->flush();
    }
}
