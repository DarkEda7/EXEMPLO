<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLconnection;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bd = new MySQLconnection();

    $comando = $bd->prepare('INSERT INTO generos (nome) VALUES(:nome)');
    $comando->execute([':nome' => $_POST['nome']]);

    header('Location:/index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Novo Gênero</title>
    </head>
    <body>
        <h1>Novo Gênero</h1>
        <form action="insert.php" method="post">
            <label for="nome">Nome do Gênero</label>
            <input type="text" require name="nome"/>
            <button type="submit">Salvar</button>
        </form>
    </body>
    </html>