<?php
require_once './vendor/autoload.php';
use PDO;

$bd = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('SELECT * FROM generos');
$comando->execute();
$generos = $comando->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lan="pt-br">
    <head>
        <meta charset="urf-8">
        <title>biblioteca</title>
    </head>
    <body>
        <table>
            <tr>
                <th>id</th>
                <th>Nome</th>
            </tr>
            <?php foreach($generos as $g): ?>
                <tr>
                    <td><?= $g['id'] ?></td>
                    <td><?= $g['nome'] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </body>
</html>