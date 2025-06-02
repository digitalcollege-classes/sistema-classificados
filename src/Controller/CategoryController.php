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
            [
                'id' => 1,
                'name' => 'Categoria Teste 1',
                'description' => 'Descrição da categoria 1',
                'photo' => '/images/categoria1.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Categoria Teste 2',
                'description' => 'Descrição da categoria 2',
                'photo' => '/images/categoria2.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Categoria Teste 3',
                'description' => 'Descrição da categoria 3',
                'photo' => '/images/categoria3.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Categoria Teste 4',
                'description' => 'Descrição da categoria 4',
                'photo' => '/images/categoria4.jpg',
            ],
            [
                'id' => 5,
                'name' => 'Categoria Teste 5',
                'description' => 'Descrição da categoria 5',
                'photo' => '/images/categoria5.jpg',
            ],
            [
                'id' => 6,
                'name' => 'Categoria Teste 6',
                'description' => 'Descrição da categoria 6',
                'photo' => '/images/categoria6.jpg',
            ],
            [
                'id' => 7,
                'name' => 'Categoria Teste 7',
                'description' => 'Descrição da categoria 7',
                'photo' => '/images/categoria7.jpg',
            ],
            [
                'id' => 8,
                'name' => 'Categoria Teste 8',
                'description' => 'Descrição da categoria 8',
                'photo' => '/images/categoria8.jpg',
            ],
            [
                'id' => 9,
                'name' => 'Categoria Teste 9',
                'description' => 'Descrição da categoria 9',
                'photo' => '/images/categoria9.jpg',
            ],
            [
                'id' => 10,
                'name' => 'Categoria Teste 10',
                'description' => 'Descrição da categoria 10',
                'photo' => '/images/categoria10.jpg',
            ],
        ];

        $this->render(self::VIEW_LIST, [
            'categories' => $categories,
        ]);
    }

    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $photo = $_FILES['photo'] ?? null;

            $photoPath = '';
            if ($photo && $photo['error'] === UPLOAD_ERR_OK) {
                // Limite de tamanho (20MB)
                if ($photo['size'] > 20 * 1024 * 1024) {
                    $_SESSION['error'] = 'A imagem deve ter no máximo 20MB.';
                    header('Location: /categorias/adicionar');
                    exit;
                }

                $uploadDir = __DIR__ . '/../../public/images/category-img/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $extension = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));
                $safeName = preg_replace('/[^a-z0-9\-]/i', '_', strtolower($name));
                $filename = $safeName . '_' . time() . '.' . $extension;
                $destination = $uploadDir . $filename;

                if (move_uploaded_file($photo['tmp_name'], $destination)) {
                    $photoPath = '/images/category-img/' . $filename;
                }
            }

            $_SESSION['categories'][] = [
                'id' => rand(100, 999),
                'name' => $name,
                'description' => $description,
                'photo' => $photoPath,
            ];

            header('Location: /categorias');
            exit;
        }

        $this->render(self::VIEW_ADD);
    }

}