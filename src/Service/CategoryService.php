<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Category;

class CategoryService extends BaseService
{
    public function __construct()
    {
        parent::__construct(Category::class);
    }

    /**
     * Busca categorias ativas.
     */
    public function findActive(): array
    {
        return $this->findBy([], ['name' => 'ASC']);
    }

    /**
     * Busca categoria por nome.
     */
    public function findByName(string $name): ?Category
    {
        return $this->findOneBy(['name' => $name]);
    }

    /**
     * Busca categoria por nome ou lança exceção se não encontrar.
     */
    public function findByNameOrFail(string $name): Category
    {
        return $this->findOneByOrFail(['name' => $name]);
    }

    /**
     * Verifica se uma categoria existe pelo nome.
     */
    public function existsByName(string $name): bool
    {
        return null !== $this->findOneBy(['name' => $name]);
    }

    /**
     * Busca categorias com paginação.
     */
    public function findPaginated(int $page = 1, int $limit = 10, array $criteria = [], ?array $orderBy = null): array
    {
        $orderBy ??= ['name' => 'ASC'];

        return parent::findPaginated($page, $limit, $criteria, $orderBy);
    }
}
