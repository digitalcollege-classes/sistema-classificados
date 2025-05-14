<?php

declare(strict_types=1);

class HomepageController
{
    public function index(): void
    {
        echo "
            Ola mundo - Pagina inicial

            <button>Clique aqui</button>
        ";
    }
}

