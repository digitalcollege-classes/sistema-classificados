<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src'],
    isDevMode: true,
);

$connection = DriverManager::getConnection([
    'dbname' => 'db_name',
    'user' => 'root',
    'password' => 'root',
    'host' => 'php03-mysql',
    'driver' => 'pdo_mysql',
], $config);

$entityManager = new EntityManager($connection, $config);

return $entityManager;