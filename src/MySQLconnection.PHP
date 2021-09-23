<?php
namespace Exemplo:

class MySQLconnection extends \PDO {
    public function __contruct() {
        parent ::__contruct('mysql:host=localhost;dbname=biblioteca', 'root', '');
    }
}