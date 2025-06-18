<?php

declare(strict_types=1);

namespace App\Controller;

final class AuthController extends AbstractController
{
    public const string VIEW_LOGIN = 'auth/login';
    public const string VIEW_LOGOUT = 'auth/logout';

    public function login(): void
    {
        $this->render(self::VIEW_LOGIN);
    }

    public function logout(): void
    {
        $this->render(self::VIEW_LOGOUT);
    }
}
