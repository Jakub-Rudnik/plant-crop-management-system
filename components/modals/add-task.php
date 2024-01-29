<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/CultivationService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/EmployeeService.php';
include_once "create-modal.php";

$title="Dodaj zadanie";

$cultivationService = new CultivationService();
$workerService = new EmployeeService();

$workers = $workerService->getEmployees();

$cultivations = $cultivationService->getCultivations();

$workersHtml = "";
$cultivationsHtml = "";

foreach ($workers as $worker) {
$workerId = $worker->workerID;
$workerFirstName = $worker->forename;
$workerLastName = $worker->lastname;
$workerName = $workerFirstName . " " . $workerLastName;

$workersHtml = $workersHtml . '<option value="' . $workerId . '"' .  '>' . $workerName . '</option>';
}

foreach ($cultivations as $cultivation) {
$cultivationsHtml = $cultivationsHtml . '<option value="' . $cultivation->cultivationID . '"' . '>' . $cultivation->name . '</option>';
}

$body = "
        <form hx-post='./api/add-task.php' hx-target='#tasks' hx-swap='innerHTML' hx-on::after-request='closeModal()'>
        <div class='form-control'>
            <label for='taskDesc' >Opis zadania</label>
            <input id='taskDesc' name='description' type='text' value='' required/>
        </div>
        <div class='form-control'>
            <label for='taskCrop'>Uprawa</label>
                <select id='taskCrop' name='cultivationID' required>"
                    . $cultivationsHtml .
                "</select>
        </div>
        <div class='form-control'>
            <label for='taskWorker'>Pracownik</label>
                <select id='taskWorker' name='workerID' required>"
                    . $workersHtml .
                "</select>
        </div>
        <div class='form-control'>
            <label for='taskDate' >Termin</label>
            <input id='taskDate' name='date' type='date' value='' required/>
        </div>
        <button type='submit' class='btn btn__big btn__primary'>Dodaj</button>
        </form>
";

echo createModal($title, $body);