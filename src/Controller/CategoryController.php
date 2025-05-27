<?php

declare(strict_types=1);

namespace App\Controller;

final class CategoryController extends AbstractController
{
    public const string VIEW_LIST = 'category/list';
    public const string VIEW_ADD = 'category/add';  

    public function list(): void
    {
        $categories = [
            'Categoria Teste',
            'Categoria Teste',
            'Categoria Teste',
        ];

        $this->render(self::VIEW_LIST, [
            'categories' => $categories,
        ]);
    }

    public function add(): void
    {
        $this->render(self::VIEW_ADD);
    }
}