<?php

declare(strict_types=1);

final class AuthController extends AbstractController
{
    public const string VIEW_LOGIN = 'auth/login';

    public function login(): void
    {
        $this->render(self::VIEW_LOGIN);
    }
}
