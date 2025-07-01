<?php

declare(strict_types=1);

namespace App\Service;

use App\Connection\DatabaseConnection;
use Doctrine\ORM\EntityManager;

abstract class AbstractService
{
    protected readonly EntityManager $entityManager;

    public function __construct()
    {
        $this->entityManager = (new DatabaseConnection())->getEntityManager();
    }
}
