<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\DatabaseConnection;
use App\Entity\Advertiser;

final class UserController extends AbstractController
{
    public const string VIEW_LIST = 'user/list';
    public const string VIEW_ADD = 'user/add';
    public const string VIEW_PROFILE = 'user/profile';

    public function list(): void
    {
        $usuarios = [
            [
                'id' => '01',
                'status' => 'ativo',
                'name' => 'Fulano',
                'type' => '1',
                'photo' => 'url',
                'data-last-login' => '2025-05-27',
                'data-add' => '2025-05-27',
                'data-edit' => '2025-05-27',
                'table-actions' => '',
            ],
            [
                'id' => '02',
                'status' => 'ativo',
                'name' => 'Beltrano',
                'type' => '1',
                'photo' => 'url',
                'data-last-login' => '2025-05-27',
                'data-add' => '2025-05-27',
                'data-edit' => '2025-05-27',
                'table-actions' => '',
            ],
            [
                'id' => '03',
                'status' => 'ativo',
                'name' => 'Cicrano',
                'type' => '1',
                'photo' => 'url',
                'data-last-login' => '2025-05-27',
                'data-add' => '2025-05-27',
                'data-edit' => '2025-05-27',
                'table-actions' => '',
            ],
        ];

        $this->render(self::VIEW_LIST, [
            'usuarios' => $usuarios,
        ]);
    }

    public function add(): void
    {
        if (true === empty($_POST)) {
            $this->render(self::VIEW_ADD);

            return;
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user = new Advertiser(
            $name,
            $email,
            'documento',
            'telefone'
        );
        $user->setPassword($password);

        $entityManager = (new DatabaseConnection)->getEntityManager();

        $entityManager->persist($user);
        $entityManager->flush();

        $this->redirectToURL('/login');
    }

    public function profile(): void
    {
        $this->render(self::VIEW_PROFILE);
    }
}
