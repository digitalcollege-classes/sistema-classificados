<?php

declare(strict_types=1);

class ErrorController extends AbstractController
{
    public function pageNotFound(): void
    {
        http_response_code(404);

        $this->render('error/page-not-found');
        //parent::render('error/page-not-found');
    }
}
