<?php

declare(strict_types=1);

class ErrorController
{
    public function pageNotFound(): void
    {
        http_response_code(404);
        echo "Pagina não encontrada";
    }
}
