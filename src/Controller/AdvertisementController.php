<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\AdvertisementService;
use App\Service\CategoryService;

final class AdvertisementController extends AbstractController
{
    public const string VIEW_LIST = 'advertisement/list';
    public const string VIEW_ADD = 'advertisement/add';
    public const string VIEW_EDIT = 'advertisement/edit';
    public const string VIEW_VIEW = 'advertisement/view';

    public function list(): void
    {
        $service = new AdvertisementService();

        $anuncios = $service->findAll();

        $this->render(self::VIEW_LIST, [
            'anuncios' => $anuncios,
        ]);
    }

    public function add(): void
    {
        $categories = (new CategoryService())->findAll();

        $this->render(self::VIEW_ADD, [
            'categories' => $categories,
        ]);
    }

    public function update(): void
    {
        $this->render(self::VIEW_EDIT);
    }

    public function view(): void
    {
        $this->render(self::VIEW_VIEW);
    }

    public function remove(): void
    {
        echo 'Removendo';
    }
}
