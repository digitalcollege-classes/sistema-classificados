<?php

use App\Controller\UserController;

return [
    '/usuarios' => [UserController::class, 'list'],
    '/usuarios/adicionar' => [UserController::class, 'add'],
    '/usuario/perfil' => [UserController::class, 'profile'],
    '/anunciantes' => [UserController::class, 'list'],
];
