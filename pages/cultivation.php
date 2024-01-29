<?php
$title = "Strona Główna | System Ogrodnictwa";
include_once "./components/header/header.php";

$request = explode('/', $_SERVER['REQUEST_URI']);
$id = intval($request[2]);

echo "<div id='cultivation'>";
$_GET['id'] = $id;
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/cultivation/index.php";
echo "</div>";

include_once "./components/footer/footer.php";
?>