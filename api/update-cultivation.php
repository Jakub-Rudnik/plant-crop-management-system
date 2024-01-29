<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lib/db.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/services/CultivationService.php";

$returnAllCultivations = $_GET['returnAllCultivations'];

$cultivationService = new CultivationService();

$name = $_POST['name'];
$varietyID = intval($_POST['varietyID']);
$cultivationID = $_POST['cultivationID'];
$quantity = $_POST['quantity'];
$humidity = $_POST['humidity'];
$temperature = $_POST['temperature'];

$cultivationService->updateCultivation($cultivationID, $name, $varietyID, $quantity, $humidity, $temperature);

if ($returnAllCultivations) {
    include_once $_SERVER['DOCUMENT_ROOT'] . "/components/cultivations/index.php";
} else {
    $_GET['id'] = $cultivationID;
    include_once $_SERVER['DOCUMENT_ROOT'] . "/components/cultivation/index.php";
}