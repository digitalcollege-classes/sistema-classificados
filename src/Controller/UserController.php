<?php

declare(strict_types=1);

final class UserController extends AbstractController
{
    public const string VIEW_LIST = 'user/list';
    public const string VIEW_ADD = 'user/add';  

    public function list(): void
    {
        $this->render(self::VIEW_LIST);
    }

    public function add(): void
    {
        $this->render(self::VIEW_ADD);
    }
}