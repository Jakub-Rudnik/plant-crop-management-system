<?php
include_once("lib/db.php");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        echo getCultivations($conn);
        break;
    case "POST":
        break;
}
