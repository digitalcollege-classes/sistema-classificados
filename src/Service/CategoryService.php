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
        return $this->repository->findBy($criteria);
    }

    public function find(int $id): ?Category
    {
        return $this->repository->find($id);
    }

    public function update(Category $category): Category
    {
        $this->entityManager->persist($category);
        $this->entityManager->flush();

        return $category;
    }

    public function remove(int $id): void
    {
        $category = $this->find($id);
        if ($category) {
            $this->entityManager->remove($category);
            $this->entityManager->flush();
        }
    }

    public function create(Category $category): void
    {
        $this->entityManager->persist($category);
        $this->entityManager->flush();
    }
}
