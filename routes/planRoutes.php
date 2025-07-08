<?php

declare(strict_types=1);

use App\Controller\AdvertiserPlanController;

return [
    '/planos' => [AdvertiserPlanController::class, 'list'],
    '/planos/adicionar' => [AdvertiserPlanController::class, 'add'],
    '/planos/editar' => [AdvertiserPlanController::class, 'edit'],
    '/planos/view' => [AdvertiserPlanController::class, 'view'],
    '/planos/excluir' => [AdvertiserPlanController::class, 'remove'],
];