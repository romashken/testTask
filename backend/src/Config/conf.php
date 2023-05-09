<?php

namespace App;

use PDO;
use PDOException;

class Data
{
    const serverName = 'localhost:3306';
    const userName = 'root';
    const password = '';
    const db = 'testChat';
}

try {
    $connection = new PDO("mysql:host=" . Data::serverName . ";" . "dbname=" . Data::db, Data::userName, Data::password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error connecting to DB: " . $e->getMessage();
    exit;
}
// $serverName = 'localhost';
// $userName = 'root';
// $password = '';
// $db = 'testChat';