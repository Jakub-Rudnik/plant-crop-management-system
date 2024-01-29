<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lib/db.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/services/CultivationService.php";

$cultivationService = new CultivationService();

$name = $_POST['name'];
$varietyID = intval($_POST['varietyID']);
$quantity = $_POST['quantity'];
$humidity = $_POST['humidity'];
$temperature = $_POST['temperature'];

$cultivationService->addCultivation($name, $varietyID, $quantity, $humidity, $temperature);

include_once $_SERVER['DOCUMENT_ROOT'] . "/components/cultivations/index.php";