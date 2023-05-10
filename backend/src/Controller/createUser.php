<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:  POST');

require_once 'src/Config/conf.php';
require_once 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $req = $connection->prepare("INSERT INTO users (nickName, chatLog) VALUES (:nick, :chatLog)");
    $req->bindParam(':nick', $data['nickName']);
    $req->bindParam(':chatLog', $data['nickName']);
    $req->execute();
    echo "Data inserted successfully";
} 

// try {
//     $connection = new PDO("mysql:host=$serverName; dbname=$db", $userName, $password);
//     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//     $connection->exec($add);
//     echo "Record Created";
// } catch (PDOException $e) {
//     echo $sql . $e->getMessage();
// }
