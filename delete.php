<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLconnection;

$bd = new MySQLconnection();

$genero = null;

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM genero WHERE id = :id');
    $comando->execute([':id' => $_GET['id']]);

    $genero = $comando->fetch(PDO::FETCH_ASSOC);
} else {
    $comando = $bd->prepare('DELETE FROM generos WHERE id = :id');
    $comando->execute([':id' => $_POST['id']]);

    header('Location:/index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Remover Gênero</title>
    </head>
    <body>
        <h1>Remover Gênero</h1>
        <p>Tem certeza que deseja remover o gênero "<?= $genero['nome'] ?>" />
        <form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?= $genero['id'] ?>" />
            <button type="submit">Excluir</button>
        </form>
    </body>
    </html>