<?php

declare(strict_types=1);

namespace App\Controller;

abstract class AbstractController
{
    public function render(string $view, array $data = []): void 
    {
        extract($data);

        include '../views/_layouts/head.phtml';

        include "../views/{$view}.phtml";

        include '../views/_layouts/footer.phtml';
    }
}
