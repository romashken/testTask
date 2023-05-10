<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
// header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization');

require_once 'src/Config/conf.php';
require_once 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $req = $connection->prepare("SELECT * FROM chatLog");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
}
