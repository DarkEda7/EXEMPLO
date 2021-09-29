<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLconnection;

$bd = new MySQLconnection();

$genero = null;

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos WHERE id = :id');
    $comando->execute([':id' => $_GET['id']]);

    $genero = $comando->fetch(PDO::FETCH_ASSOC);
} else {
    $comando = $bd->prepare('UPDATE generos SET nome = WHERE id = :id');
    $comando->execute([':nome' => $_POST['nome'], ':id' => $_POST['id']]);

    header('Location:/index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Editar Gênero</title>
    </head>
    <body>
        <h1>Editar Gênero</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $genero['id'] ?>"
            <label for ="nome">Nome do Gênero</label>
            <input type="text" required name="nome" value="<?= $genero['id'] ?>"
            <button type="submit">Salvar</button>
        </form>
    </body>
    </html>