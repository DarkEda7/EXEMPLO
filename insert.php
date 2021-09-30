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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        <h1>Novo Gênero</h1>
        <form action="insert.php" method="post">
            <div class="form-group">
                <label for="nome">Nome do Gênero</label>
                <input type="text" require name="nome"/>
            </div>
            <br />
             <button class="btn btn-success" type="submit">Salvar</button>
        </form>
    </body>
    </html>