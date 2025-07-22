<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Category;
use App\Service\CategoryService;
use Exception;

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

        $this->render(self::VIEW_LIST, [
            'categories' => $categories,
        ]);
    }

    public function add(): void
    {
        if (true === empty($_POST)) {
            $this->render(self::VIEW_ADD);

            return;
        }

        $category = new Category();
        $category->setName($_POST['name']);
        $category->setDescription($_POST['description']);

        $this->service->create($category);

        // depois de salvar no banco a nova categoria

        //upload da foto
        $photo = $_FILES['photo'];

        //o caminho pra ela vai
        $onde = dirname(__DIR__, 2).'/public/assets/images/uploads/category/';

        // montando o novo nome da foto
        $id = $category->getId();
        $extension = explode('/', $photo['type'])[1];
        $nomeDaFoto = "category-{$id}.{$extension}";

        $type = mime_content_type($photo['tmp_name']);

        $availables_types = [
            'image/jpeg',
            'image/png',
            'image/jpg',
        ];

        if (false === in_array($type, $availables_types)) {
            throw new Exception('Arquivo da imagem não é uma imagem');
        }

        move_uploaded_file($photo['tmp_name'], $onde.$nomeDaFoto);

        $category->setImagePath("/assets/images/uploads/category/$nomeDaFoto");

        $this->service->update($category);

        $this->redirectToURL('/categorias');
    }
}
