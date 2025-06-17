<?php

declare(strict_types=1);

use App\Controller\ErrorController;
use App\Controller\HomepageController;

require_once '../vendor/autoload.php';

$url = parse_url($_SERVER['REQUEST_URI'])['path'];

function routes(string $routeNames): array
{
    return include "../routes/{$routeNames}Routes.php";
}

$routes = [
    '/' => [HomepageController::class, 'index'],
];

$routes = [
    ...$routes,
    ...routes('user'),
    ...routes('auth'),
    ...routes('advertisement'),
    ...routes('category'),
];

// CRUD Advertisement
// /anuncios

if (false === isset($routes[$url])) {
    (new ErrorController())->pageNotFound();
    exit; // matar a aplicação
}

[$controller, $method] = $routes[$url];

(new $controller())->$method();
