<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\ContactInformation;

class ContactInformationService
{
    public function findAll(): array
    {
        return [];
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
