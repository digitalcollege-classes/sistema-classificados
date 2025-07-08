<?php

declare(strict_types=1);

namespace App\Controller;

abstract class AbstractController
{
    public function render(string $view, array $data = [], bool $showNavbar = true): void
    {
        extract($data);

        include '../views/_layouts/head.phtml';

        if ($showNavbar) {
            include '../views/_layouts/navbar.phtml';
        }

        include "../views/{$view}.phtml";

        include '../views/_layouts/footer.phtml';
    }

    public function redirectToURL(string $url): void
    {
        header("location: {$url}");
    }
}
