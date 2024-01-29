<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/CultivationService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/EmployeeService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/TaskService.php';
include_once "create-modal.php";

$title="Edytuj zadanie";

$taskID = intval($_GET['id']);

$cultivationService = new CultivationService();
$workerService = new EmployeeService();
$taskService = new TaskService();

$workers = $workerService->getEmployees();

$cultivations = $cultivationService->getCultivations();
$task = $taskService->getTask($taskID);

$workersHtml = "";
$cultivationsHtml = "";

foreach ($workers as $worker) {
$workerId = $worker->workerID;
$workerFirstName = $worker->forename;
$workerLastName = $worker->lastname;
$workerName = $workerFirstName . " " . $workerLastName;

$workersHtml = $workersHtml . '<option value="' . $workerId . '"' . ($workerId == $task->employee->workerID ? "selected" : " ") . '>' . $workerName . '</option>';
}

foreach ($cultivations as $cultivation) {
$cultivationsHtml = $cultivationsHtml . '<option value="' . $cultivation->cultivationID . '"' . ($cultivation->cultivationID == $task->cultivationID ? "selected" : " ") . '>' . $cultivation->name . '</option>';
}

$taskDone = $task->done ? "checked" : "";

$body = "
        <form hx-post='./api/update-task.php' hx-target='#tasks' hx-swap='innerHTML' hx-on::after-request='closeModal()'>
        <input type='number' hidden name='taskID' value='" . $task->taskID . "'/>
        <div class='form-control'>
            <label for='taskDesc' >Opis zadania</label>
            <input id='taskDesc' name='description' type='text' value='" . $task->description . "' required/>
        </div>
        <div class='form-control'>
            <label for='taskCrop'>Uprawa</label>
                <select id='taskCrop' name='cultivationID'>"
                    . $cultivationsHtml .
                "</select>
        </div>
        <div class='form-control'>
            <label for='taskWorker'>Pracownik</label>
                <select id='taskWorker' name='workerID'>"
                    . $workersHtml .
                "</select>
        </div>
        <div class='form-control'>
            <label for='taskDate' >Termin</label>
            <input id='taskDate' name='date' type='date' value='" . $task->date . "' required/>
        </div>
        <div class='form-control'>
            <label for='taskDone' >Ukończone</label>
            <input id='taskDone' name='done' type='checkbox' " . $taskDone . ">
        </div>
        <button type='submit' class='btn btn__big btn__primary'>Edytuj</button>
        </form>
";

echo createModal($title, $body);