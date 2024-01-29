<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/CultivationService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/TaskService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/EmployeeService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/VarietyService.php';

$cultivationService = new CultivationService();
$taskService = new TaskService();
$employeeService = new EmployeeService();
$varietyService = new VarietyService();

$crops = count($cultivationService->getCultivations());
$workers = count($employeeService->getEmployees());
$varieties = count($varietyService->getVarieties());
$tasks = count($taskService->getTasks());


echo "
<div class='card'>
        <h3 class='card__title'>
            Uprawy
        </h3>
        <div class='card__body'>
            <p class='fontXXL'>$crops</p>
        </div>
        <div class='card__footer'>
            <a class='btn btn__primary' href='/uprawy'>Przejdź</a>
        </div>
    </div>
    <div class='card'>
        <h3 class='card__title'>
            Pracownicy
        </h3>
        <div class='card__body'>
            <p class='fontXXL'>$workers</p>
        </div>
        <div class='card__footer'>
            <a class='btn btn__primary' href='/pracownicy'>Przejdź</a>
        </div>
    </div>
    <div class='card'>
        <h3 class='card__title'>
           Odmiany
        </h3>
        <div class='card__body'>
            <p class='fontXXL'>$varieties</p>
        </div>
    </div>
    <div class='card'>
        <h3 class='card__title'>
           Zadania
        </h3>
        <div class='card__body'>
            <p class='fontXXL'>$tasks</p>
        </div>
        <div class='card__footer'>
            <a class='btn btn__primary' href='/zadania'>Przejdź</a>
        </div>
    </div>
";
