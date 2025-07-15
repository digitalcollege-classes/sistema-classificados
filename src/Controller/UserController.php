<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Advertiser;
use App\Service\AdvertiserService;

final class UserController extends AbstractController
{
    public const string VIEW_LIST = 'user/list';
    public const string VIEW_ADD = 'user/add';
    public const string VIEW_PROFILE = 'user/profile';

    private AdvertiserService $advertiserService;

    public function __construct()
    {
        $this->advertiserService = new AdvertiserService();
    }

    public function list(): void
    {
        $advertisers = $this->advertiserService->findAll();

        $usuarios = [];
        foreach ($advertisers as $advertiser) {
            $status = $advertiser->isActive() ? 'ativo' : 'inativo';

            $usuarios[] = [
                'id' => $advertiser->getId(),
                'name' => $advertiser->getName(),
                'display_name' => $advertiser->getShortName(),
                'email' => $advertiser->getEmail(),
                'document' => $advertiser->getDocument(),
                'phone' => $advertiser->getPhone(),
                'type' => 'Anunciante',
                'data-add' => $advertiser->getCreatedAt()->format('Y-m-d'),
                'data-edit' => $advertiser->getUpdatedAt()->format('Y-m-d'),
                'status' => $status,
            ];
        }

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

        $this->advertiserService->create($user);

        $this->redirectToURL('/login');
    }

    public function profile(): void
    {
        $this->render(self::VIEW_PROFILE);
    }
}
