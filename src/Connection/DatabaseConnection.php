<?php

declare(strict_types=1);

namespace App\Connection;

use Doctrine\ORM\EntityManager;

class DatabaseConnection
{
    public function getEntityManager(): EntityManager
    {
        return include dirname(__DIR__, 2).'/doctrine.php';
    }
}
