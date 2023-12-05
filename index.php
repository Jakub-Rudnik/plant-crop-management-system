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
    case 'zadania':
        require __DIR__ . $pagesDir . 'tasks.php';
        break;
    case 'pracownicy':
        require __DIR__ . $pagesDir . 'workers.php';
        break;
    case 'templates':
        if (count($request) == 3) {
           switch ($request[2]) {
               case "crop-modal":
                   require __DIR__ . '/templates/crop-modal.php';
                   break;
               case "worker-modal":
                   require __DIR__ . '/templates/worker-modal.php';
                   break;
               case "task-modal":
                   require __DIR__ . '/templates/task-modal.php';
                   break;
               case "delete-modal":
                   require __DIR__ . '/templates/delete-modal.php';
                   break;
               default:
                   require __DIR__ . $pagesDir . '404.php';
                   break;
           }
        } else {
            require __DIR__ . $pagesDir . '404.php';
        }
        break;
    case 'login':
        require __DIR__ . $pagesDir . 'login.php';
        break;
    case 'register':
        require __DIR__ . $pagesDir . 'register.php';
        break;
    default:
        require __DIR__ . $pagesDir . '404.php';
}
?>