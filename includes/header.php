<?php
switch ($_SERVER['REQUEST_URI']) {
    case '':
    case '/':
        $CURRENT_PAGE = "Dashboard";
        $PAGE_TITLE = "Panel Główny";
        break;
    case "/uprawy":
        $CURRENT_PAGE = "CropsPanel";
        $PAGE_TITLE = "Zarządzanie Uprawami";
        break;
    case "/harmonogram":
        $CURRENT_PAGE = "SchedulePage";
        $PAGE_TITLE = "Harmonogram";
        break;
    case "/pracownicy":
        $CURRENT_PAGE = "workers";
        $PAGE_TITLE = "Zarządzanie Pracownikami";
        break;
    default:
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to my homepage!";
}
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$PAGE_TITLE ?></title>
    <link rel="stylesheet" href="../styles/main.css">
    <?php if ($CURRENT_PAGE == "Index") { ?>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
    <?php } ?>
</head>
<body>
    <?php require_once "navigation.php" ?>
    <div class="main__container">
