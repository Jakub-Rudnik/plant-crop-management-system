<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/services/CultivationService.php";

$id = $_GET['id'];

$cultivationService = new CultivationService();

$cultivationService->deleteCultivation($id);