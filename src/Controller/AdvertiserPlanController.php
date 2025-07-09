<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\AdvertiserPlanService;

final class AdvertiserPlanController extends AbstractController
{
    public const string VIEW_LIST = 'plan/list';
    public const string VIEW_ADD = 'plan/add';
    public const string VIEW_EDIT = 'plan/edit';
    public const string VIEW_VIEW = 'plan/view';

    private readonly AdvertiserPlanService $service;

    public function __construct()
    {
        $this->service = new AdvertiserPlanService();
    }

    public function list(): void
    {
        $plans = $this->service->findAll();
        $this->render(self::VIEW_LIST, [
            'plans' => $plans,
        ]);
    }

    public function add(): void
    {
        $this->render(self::VIEW_ADD);
    }

    public function edit(): void
    {
        $this->render(self::VIEW_EDIT);
    }

    public function view(): void
    {
        $this->render(self::VIEW_VIEW);
    }

    public function remove(): void
    {
        echo 'Removendo plano';
    }
}
