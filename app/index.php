<?php

$req = $_SERVER["REQUEST_URI"];
$view_dir = "/views/";

switch ($req) {
case "":
case "/":
    require __DIR__ . $view_dir . "index.php";
    break;

default:
}

?>
