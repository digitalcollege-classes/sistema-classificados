<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityRepository;
use InvalidArgumentException;

abstract class BaseService extends AbstractService
{
    protected EntityRepository $repository;
    protected string $entityClass;

    public function __construct(string $entityClass)
    {
        parent::__construct();
        $this->entityClass = $entityClass;
        $this->repository = $this->entityManager->getRepository($entityClass);
    }

    /**
     * Busca todas as entidades.
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }

    /**
     * Busca entidades por critérios.
     */
    public function findBy(array $criteria, ?array $orderBy = null, ?int $limit = null, ?int $offset = null): array
    {
        return $this->repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * Busca uma entidade por ID.
     */
    public function find(int $id): ?object
    {
        return $this->repository->find($id);
    }

    /**
     * Busca uma entidade por ID ou lança exceção se não encontrar.
     */
    public function findOrFail(int $id): object
    {
        $entity = $this->find($id);

        if (!$entity) {
            throw new InvalidArgumentException(sprintf('Entidade %s com ID %d não encontrada', $this->entityClass, $id));
        }

        return $entity;
    }

    /**
     * Cria uma nova entidade.
     */
    public function create(object $entity): object
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }

    /**
     * Atualiza uma entidade existente.
     */
    public function update(object $entity): object
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }

    /**
     * Remove uma entidade por ID.
     */
    public function remove(int $id): void
    {
        $entity = $this->findOrFail($id);
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }

    /**
     * Remove uma entidade diretamente.
     */
    public function removeEntity(object $entity): void
    {
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }

    /**
     * Conta o total de entidades.
     */
    public function count(array $criteria = []): int
    {
        return $this->repository->count($criteria);
    }

    /**
     * Busca uma entidade por critérios específicos.
     */
    public function findOneBy(array $criteria): ?object
    {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * Busca uma entidade por critérios ou lança exceção se não encontrar.
     */
    public function findOneByOrFail(array $criteria): object
    {
        $entity = $this->findOneBy($criteria);

        if (!$entity) {
            throw new InvalidArgumentException(sprintf('Entidade %s não encontrada com os critérios fornecidos', $this->entityClass));
        }

        return $entity;
    }

    /**
     * Verifica se uma entidade existe.
     */
    public function exists(int $id): bool
    {
        return null !== $this->find($id);
    }

    /**
     * Busca com paginação.
     */
    public function findPaginated(int $page = 1, int $limit = 10, array $criteria = [], ?array $orderBy = null): array
    {
        $offset = ($page - 1) * $limit;

        return [
            'data' => $this->findBy($criteria, $orderBy, $limit, $offset),
            'total' => $this->count($criteria),
            'page' => $page,
            'limit' => $limit,
            'pages' => ceil($this->count($criteria) / $limit),
        ];
    }
}
