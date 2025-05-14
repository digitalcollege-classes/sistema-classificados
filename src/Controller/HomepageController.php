<?php

declare(strict_types=1);

class HomepageController extends AbstractController
{
    public function index(): void
    {
        $this->render('homepage/index');
    }
}
