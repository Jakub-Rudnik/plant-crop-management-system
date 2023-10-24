<?php
$request = $_SERVER['REQUEST_URI'];

switch($request) {
    case '':
    case '/':
        echo "Hello!!";
        break;
    case '/uprawy':
        require './pages/crops.php';
}
?>