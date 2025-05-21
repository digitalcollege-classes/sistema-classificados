<?php

use App\Controller\UserController;

return [
    '/usuarios' => [UserController::class, 'list'],
    '/usuarios/adicionar' => [UserController::class, 'add'],
];