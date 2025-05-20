<?php

declare(strict_types=1);

abstract class AbstractController
{
    public function render(string $view): void 
    {
        include "../views/{$view}.phtml";
    }
}

