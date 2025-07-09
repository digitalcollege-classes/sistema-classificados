<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\AdvertisementService;

final class AdvertisementController extends AbstractController
{
    public const string VIEW_LIST = 'advertisement/list';
    public const string VIEW_ADD = 'advertisement/add';
    public const string VIEW_EDIT = 'advertisement/edit';
    public const string VIEW_VIEW = 'advertisement/view';

    public function list(): void
    {
        $service = new AdvertisementService();

        $anuncios = $service->findAll();

        $this->render(self::VIEW_LIST, [
            'anuncios' => $anuncios,
        ]);
    }

public function add(): void
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $status = $_POST['status'] ?? '';
        $categoria = $_POST['categoria'] ?? '';

        // Aqui você pode adicionar validações

        $service = new \App\Service\AdvertisementService();
        $service->create([
            'titulo' => $titulo,
            'descricao' => $descricao,
            'status' => $status,
            'categoria' => $categoria,
            // Adicione outros campos se necessário
        ]);

        header('Location: /anuncios');
        exit;
    }

    // Se GET, apenas renderiza o formulário
    $this->render('advertisement/add');
}

    public function update(): void
    {
        $this->render(self::VIEW_EDIT);
    }

    public function view(): void
    {
        $this->render(self::VIEW_VIEW);
    }

    public function remove(): void
    {
        echo 'Removendo';
    }
}
