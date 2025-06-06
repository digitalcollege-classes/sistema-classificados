<?php

use App\Controller\AdvertiserController;

return [
    '/anunciantes' => [AdvertiserController::class, 'index'],
    '/anunciantes/novo' => [AdvertiserController::class, 'create'],
    '/anunciantes/cadastrar' => [AdvertiserController::class, 'store'],
    '/anunciantes/editar' => [AdvertiserController::class, 'edit'],
    '/anunciantes/atualizar' => [AdvertiserController::class, 'update'],
    '/anunciantes/ativar' => [AdvertiserController::class, 'activate'],
    '/anunciantes/desativar' => [AdvertiserController::class, 'deactivate'],
    '/anunciantes/deletar' => [AdvertiserController::class, 'delete'],
]; 