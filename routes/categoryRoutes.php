<?php

use App\Controller\CategoryController;

return [
    '/categorias' => [CategoryController::class, 'list'],
    '/categorias/adicionar' => [CategoryController::class, 'add'],
];