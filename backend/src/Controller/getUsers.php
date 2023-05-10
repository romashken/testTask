<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:  GET');

require_once 'src/Config/conf.php';
require_once 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $req = $connection->prepare("SELECT * FROM users");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
}

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo "<br> id: " . $row["id"] . "<br> nickName: " . $row["nickName"] . "<br> chatLog: " . $row["chatLog"];
//     }
// }

// $connection->close();
// echo "All Records";
// echo ($connection->exec($getAll));
// } catch (PDOException $e) {
// echo $sql . $e->getMessage();
// }