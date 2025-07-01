<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\CategoryService;

final class CategoryController extends AbstractController
{
    public const string VIEW_LIST = 'category/list';
    public const string VIEW_ADD = 'category/add';

    private readonly CategoryService $service;

    public function __construct()
    {
        $this->service = new CategoryService();
    }

    public function list(): void
    {
        $categories = $this->service->findAll();

        echo 'Quantidade:'.count($categories);

        $categories = [
            [
                'id' => 1,
                'name' => 'Categoria Teste 1',
                'description' => 'Descrição da categoria 1',
                'photo' => '/assets/images/sujiro.jpeg',
            ],
            [
                'id' => 2,
                'name' => 'Categoria Teste 2',
                'description' => 'Descrição da categoria 2',
                'photo' => '/assets/images/sujiro.jpeg',
            ],
            [
                'id' => 3,
                'name' => 'Categoria Teste 3',
                'description' => 'Descrição da categoria 3',
                'photo' => '/assets/images/sujiro.jpeg',
            ],
            [
                'id' => 4,
                'name' => 'Categoria Teste 4',
                'description' => 'Descrição da categoria 4',
                'photo' => '/assets/images/sujiro.jpeg',
            ],
            [
                'id' => 5,
                'name' => 'Categoria Teste 5',
                'description' => 'Descrição da categoria 5',
                'photo' => '/assets/images/sujiro.jpeg',
            ],
            [
                'id' => 6,
                'name' => 'Categoria Teste 6',
                'description' => 'Descrição da categoria 6',
                'photo' => '',
            ],
            [
                'id' => 7,
                'name' => 'Categoria Teste 7',
                'description' => 'Descrição da categoria 7',
                'photo' => '',
            ],
            [
                'id' => 8,
                'name' => 'Categoria Teste 8',
                'description' => 'Descrição da categoria 8',
                'photo' => '',
            ],
            [
                'id' => 9,
                'name' => 'Categoria Teste 9',
                'description' => 'Descrição da categoria 9',
                'photo' => '',
            ],
            [
                'id' => 10,
                'name' => 'Categoria Teste 10',
                'description' => 'Descrição da categoria 10',
                'photo' => '',
            ],
            [
                'id' => 11,
                'name' => 'Categoria Teste 11',
                'description' => 'Descrição da categoria 11',
                'photo' => '',
            ],
            [
                'id' => 12,
                'name' => 'Categoria Teste 12',
                'description' => 'Descrição da categoria 12',
                'photo' => '',
            ],
            [
                'id' => 13,
                'name' => 'Categoria Teste 13',
                'description' => 'Descrição da categoria 13',
                'photo' => '',
            ],
            [
                'id' => 14,
                'name' => 'Categoria Teste 14',
                'description' => 'Descrição da categoria 14',
                'photo' => '',
            ],
            [
                'id' => 15,
                'name' => 'Categoria Teste 15',
                'description' => 'Descrição da categoria 15',
                'photo' => '',
            ],
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
