<?php

use App\Controller\AdvertisementController;
use App\Controller\UserController;

return [
    '/anuncios' => [AdvertisementController::class, 'list'],
    '/anuncios/adicionar' => [AdvertisementController::class, 'add'],
    '/anuncios/excluir' => [AdvertisementController::class, 'remove'],
    '/anuncios/editar' => [AdvertisementController::class, 'update'],
    '/anuncios/view' => [AdvertisementController::class, 'view'],
];