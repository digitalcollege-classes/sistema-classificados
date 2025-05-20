<?php

declare(strict_types=1);

final class HomepageController extends AbstractController
{
    public const string VIEW_HOME = 'homepage/index';

    public function index(): void
    {
        $this->render(self::VIEW_HOME);
    }
}
