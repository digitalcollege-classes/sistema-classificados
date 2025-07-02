<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\ContactInformation;
use Doctrine\ORM\EntityRepository;

class ContactInformationService extends AbstractService
{
    private readonly EntityRepository $repository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = $this->entityManager->getRepository(ContactInformation::class);
    }

    public function findAll(): array
    {
        return $this->repository->findAll();
    }

    public function findBy(array $criteria): array
    {
        return [];
    }

    public function find(int $id): ContactInformation
    {
        return new ContactInformation();
    }

    public function update(ContactInformation $contactInformation): ContactInformation
    {
        return $contactInformation;
    }

    public function remove(int $id): void
    {
    }

    public function create(ContactInformation $contactInformation): void
    {
    }
}
