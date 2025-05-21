<?php

declare(strict_types=1);

namespace App\Controller;

final class AdvertisementController extends AbstractController
{
    public const string VIEW_LIST = 'advertisement/list';
    public const string VIEW_ADD = 'advertisement/add';  
    public const string VIEW_EDIT = 'advertisement/edit';  

    public function list(): void
    {
        $anuncios = [
            'Joaquim',
            'Filomena',
            'Raimundinha',
        ];

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

    public function remove(): void
    {
        echo "Removendo";
    }
}