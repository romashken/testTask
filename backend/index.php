<?php

require_once 'src/Config/conf.php';
require_once 'vendor/autoload.php';
require "system/Routing.php";

$url = parse_url($_SERVER['REQUEST_URI']);
// $urli = $_SERVER['name'];

// $r = new Router();
// $r->addRoute("/", "main.php");
// $r->addRoute("/getMessages", "src/Controller/getMessages.php");
// $r->addRoute("/users", "getUsers.php");

// $r->route("/" . $url);
// echo "Hello";
// echo $_SERVER;


// echo "$url url <br> ";


if ($url['path'] === "/messages") {
    require 'src/Controller/getMessages.php';
}
if ($url['path'] === "/users") {
    require 'src/Controller/getUsers.php';
}
if ($url['path'] === "/send") {
    require 'src/Controller/sendMessage.php';
}
if ($url['path'] === "/delete") {
    require 'src/Controller/deleteMessage.php';
}

// $routes = [
//     "/messages" => 'src/Controller/getMessages.php',
//     "/users" => 'src/Controller/getUsers.php',
//     "/send" => 'src/Controller/sendMessage.php',
// ];

// if (array_key_exists($uri, $routes)) {
//     require $routes[$uri];
// }

// echo $url;

// $test = 'test';
