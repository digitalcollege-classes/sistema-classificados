<?php

declare(strict_types=1);

namespace App\Controller;

final class UserController extends AbstractController
{
    public const string VIEW_LIST = 'user/list';
    public const string VIEW_ADD = 'user/add';  

    public function list(): void
    {
        $usuarios = [
            'Joaquim',
            'Filomena',
            'Raimundinha',
        ];

        $this->render(self::VIEW_LIST, [
            'usuarios' => $usuarios,
        ]);
    }

    public function add(): void
    {
        $this->render(self::VIEW_ADD);
    }
}