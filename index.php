<?php
$request = $_SERVER['REQUEST_URI'];
$pagesDir = '/pages/';

switch($request) {
    case '':
    case '/':
        echo "Hello!!";
        break;
    case '/uprawy':
        require __DIR__ . $pagesDir . 'crops.php';
        break;
    case '/harmonogram':
        require __DIR__ . $pagesDir . 'schedule.php';
        break;
    case '/pracownicy':
        require __DIR__ . $pagesDir . 'workers.php';
        break;
    default:
        require __DIR__ . $pagesDir . '404.php';
}
?>