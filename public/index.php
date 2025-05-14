<?php

include '../src/Controller/AuthController.php';
include '../src/Controller/ErrorController.php';
include '../src/Controller/HomepageController.php';
include '../src/Controller/UserController.php';

$url = $_SERVER['REQUEST_URI'];

$routes = [
    '/' => [HomepageController::class, 'index'],
    '/usuarios' => [UserController::class, 'list'],
    '/usuarios/adicionar' => [UserController::class, 'add'],
    '/login' => [AuthController::class, 'login'],
];

if (false === isset($routes[$url])) {
    (new ErrorController())->pageNotFound();
    exit; //matar a aplicação
} 

// forma 01
// $controller = $routes[$url][0]; //HomepageController
// $method = $routes[$url][1]; // index

// forma 02
[$controller, $method] = $routes[$url]; //desconstruindo

(new $controller())->$method(); // (new HomepageController())->index();







