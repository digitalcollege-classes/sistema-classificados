<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Category;
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

        $this->redirectToURL('/categorias');
    }
}
