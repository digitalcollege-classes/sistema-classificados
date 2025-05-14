<?php 
    
$url = explode('?', $_SERVER['REQUEST_URI'])[0];


include '../src/conexao.php';

if ($url === '/api/usuarios') {
    header('Content-Type: application/json');

    $query = "SELECT * FROM tb_contatos";

    $statement = $pdo->prepare($query);
    $statement->execute();

    $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($dados);

} else if ($url === '/admin/usuarios') {

    $query = "SELECT * FROM tb_contatos";

    $statement = $pdo->prepare($query);
    $statement->execute();

    $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    foreach($dados as $cada) {
        echo "<tr>
            <td>{$cada['nome']}</td>
            <td>{$cada['email']}</td>
        </tr>";
    }
    echo "</table>";

} else {
    echo json_encode([
        'error' => 'Page not found',
    ]);
}