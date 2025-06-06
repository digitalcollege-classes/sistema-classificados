<?php

declare(strict_types=1);

namespace App\Controller;

final class AdvertiserController extends AbstractController
{
    public const string VIEW_INDEX = 'advertiser/index';
    public const string VIEW_CREATE = 'advertiser/create';
    public const string VIEW_EDIT = 'advertiser/edit';

    public function index(): void
    {
        $advertisers = [
            [
                'name' => 'João Silva',
                'email' => 'joao@email.com',
                'document' => '123.456.789-00',
                'phone' => '(85) 99999-9999',
                'status' => 'ativo'
            ],
            [
                'name' => 'Maria Santos',
                'email' => 'maria@email.com',
                'document' => '987.654.321-00',
                'phone' => '(85) 88888-8888',
                'status' => 'inativo'
            ]
        ];
        
        $this->render(self::VIEW_INDEX, [
            'advertisers' => $advertisers
        ]);
    }

    public function create(): void
    {
        $this->render(self::VIEW_CREATE);
    }

    public function store(): void
    {
        header('Location: /anunciantes');
        exit;
    }

    public function edit(): void
    {
        $advertiser = [
            'name' => 'João Silva',
            'email' => 'joao@email.com',
            'document' => '123.456.789-00',
            'phone' => '(85) 99999-9999',
            'status' => 'ativo'
        ];
        
        $this->render(self::VIEW_EDIT, [
            'advertiser' => $advertiser
        ]);
    }

    public function update(): void
    {
        header('Location: /anunciantes');
        exit;
    }

    public function activate(): void
    {
        header('Location: /anunciantes');
        exit;
    }

    public function deactivate(): void
    {
        header('Location: /anunciantes');
        exit;
    }

    public function delete(): void
    {
        header('Location: /anunciantes');
        exit;
    }
} 