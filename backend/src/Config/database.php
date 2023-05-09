<?php

namespace App;

use PDO;
use PDOException;

require_once 'conf.php';

class Database
{
    public static function connect()
    {
        try {
            $db = "mysql:host=" . Data::serverName . ";" . "dbname=" . Data::db . ";" . ";charset=utf8";
            $connection = new PDO($db, Data::userName, Data::password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }
}
