<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:  POST');

require_once 'src/Config/conf.php';
require_once 'vendor/autoload.php';
date_default_timezone_set('Europe/Moscow');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $creationTime = date('d.m.Y H:i', time());
    // $creationTime = date('H:i:s');

    $req = $connection->prepare("INSERT INTO chatLog (nickName, message) VALUES (:nick, :message)");
    $req->bindParam(':nick', $data['nickName']);
    $req->bindParam(':message', $data['message']);
    $req->execute();

    $id = $connection->lastInsertId();
    $message = [
        'id' => $id,
        'nickName' => $data['nickName'],
        'message' => $data['message'],
        'createdAt' => $creationTime,
    ];

    header('Content-Type: application/json');
    echo json_encode($message);
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Retrieve data from request body
//     $data = json_decode(file_get_contents("php://input"), true);
//     // Insert data into database
//     $stmt = $conn->prepare("INSERT INTO your_table_name (column1, column2, column3) VALUES (:column1, :column2, :column3)");
//     $stmt->bindParam(':column1', $data['column1']);
//     $stmt->bindParam(':column2', $data['column2']);
//     $stmt->bindParam(':column3', $data['column3']);
//     $stmt->execute();
//     echo "Data inserted successfully";
// }
