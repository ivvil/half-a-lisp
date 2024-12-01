<?php

// Taken from https://www.freecodecamp.org/news/how-to-build-a-routing-system-in-php/

$req = $_SERVER["REQUEST_URI"];
$view_dir = "/views/";

switch ($req) {
case "":
case "/":
    require __DIR__ . $view_dir . "index.php";
    break;
case "/code":    
case "/language":
    require __DIR__ . $view_dir . "tabs.php";
    break;
default:
    http_response_code(404);
    break;
}

?>
