<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:  DELETE');

require_once 'src/Config/conf.php';
require_once 'vendor/autoload.php';
// date_default_timezone_set('Europe/Moscow');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    try {
        $id = end(explode("=", $url["query"]));
        // $deletionDate = date('d.m.Y H:i', time());

        $req = $connection->prepare("DELETE FROM chatLog WHERE id LIKE '$id'");
        $req->execute();
        echo "Message deleted successfully";

        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        echo $id;
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
