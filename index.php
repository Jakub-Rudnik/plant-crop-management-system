<?php
$request = explode('/', $_SERVER['REQUEST_URI']);
$pagesDir = '/pages/';

switch($request[1]) {
    case '':
        require __DIR__ . $pagesDir . 'home.php';
        break;
    case 'uprawy':
        require __DIR__ . $pagesDir . 'cultivations.php';
        break;
    case 'uprawa':
        if (count($request) == 3) {
            if (preg_match('/\d/', $request[2]))
            require  __DIR__ . $pagesDir . 'cultivation.php';
            break;
        }
        require __DIR__ . $pagesDir . '404.php';
        break;
    case 'harmonogram':
        require __DIR__ . $pagesDir . 'schedule.php';
        break;
    case 'pracownicy':
        require __DIR__ . $pagesDir . 'workers.php';
        break;
    default:
        require __DIR__ . $pagesDir . '404.php';
}
?>