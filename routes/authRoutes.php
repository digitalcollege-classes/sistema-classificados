<?php

use App\Controller\AuthController;

return [
    '/login' => [AuthController::class, 'login'],
    '/logout' => [AuthController::class, 'logout'],
];