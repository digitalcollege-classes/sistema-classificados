<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Advertisement;

final class AdvertisementController extends AbstractController
{
    public const string VIEW_LIST = 'advertisement/list';
    public const string VIEW_ADD = 'advertisement/add';
    public const string VIEW_EDIT = 'advertisement/edit';
    public const string VIEW_VIEW = 'advertisement/view';
    public function list(): void
    {
        $entityManager = require_once dirname(path: __DIR__, levels: 2).'/doctrine.php';

        $repository = $entityManager->getRepository(Advertisement::class);

        // SELECT * FROM 
        $anuncios = $repository->findAll();

        $this->render(self::VIEW_LIST, [
            'anuncios' => $anuncios,
        ]);
    }

    public function add(): void
    {
        $this->render(self::VIEW_ADD);
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
