<?php

declare(strict_types=1);

use App\Controller\AuthController;

return [
    '/login' => [AuthController::class, 'login'],
    '/logout' => [AuthController::class, 'logout'],
];
