<?php
$request = $_SERVER['REQUEST_URI'];
$pagesDir = '/pages/';

switch($request) {
    case '':
    case '/':
        require __DIR__ . $pagesDir . 'home.php';
        break;
    case '/uprawy':
        require __DIR__ . $pagesDir . 'cultivations.php';
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