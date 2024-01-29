<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/services/CultivationService.php";

$watering = $_GET['watering'] == '1' ? 0 : 1;

$cultivationService = new CultivationService();
$cultivationService->switchWatering($_GET['id'], $watering);

include_once $_SERVER['DOCUMENT_ROOT'] . "/components/cultivation/index.php";