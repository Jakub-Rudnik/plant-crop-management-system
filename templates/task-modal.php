<?php
require_once "./lib/functions.php";
require_once "create-modal.php";

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        echo 404;
        break;
    case "POST":
        $_POST = json_decode(file_get_contents('php://input'), true);
        $id = $_POST['id'] ?? 0;
        $title = $_POST['title'] ?? "";

        $crops = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/crops.json'), true);
        $workers = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/workers.json'), true);
        $tasks = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/tasks.json'), true);

        $task = find($tasks, $id);

        $workersHtml = "";
        $cropsHtml = "";
        $taskWorker = $task['worker_id'] ?? 0;
        $taskCrop = $task['cultivation_id'] ?? 0;

        foreach ($workers as $worker) {
            $workerId = $worker['id'] ?? 0;
            $workerFirstName = $worker['forename'] ?? '';
            $workerLastName = $worker['lastname'] ?? '';
            $workerName = $workerFirstName . " " . $workerLastName;

            $workersHtml = $workersHtml . '<option value="' . $workerId . '"' . ($workerId == $taskWorker ? "selected" : " ") . '>' . $workerName . '</option>';
        }

        foreach ($crops as $crop) {
            $cropId = $crop['id'] ?? 0;
            $cropName = $crop['name'] ?? '';

            $cropsHtml = $cropsHtml . '<option value="' . $cropId . '"' . ($cropId == $taskCrop ? "selected" : " ") . '>' . $cropName . '</option>';
        }

        $taskDesc = $task['description'] ?? '';
        $taskDate = $task['date'] ?? 0;
        $taskDone = $task['done'] ?? 0;

        $body = "
                <form>
                <div class='form-control'>
                    <label for='taskDesc' >Nazwa uprawy</label>
                    <input id='taskDesc' type='text' value='" . $taskDesc . "'/>
                </div>
                <div class='form-control'>
                    <label for='taskCrop'>Uprawa</label>
                        <select id='taskCrop'>"
                            . $cropsHtml .
                        "</select>
                </div>
                <div class='form-control'>
                    <label for='taskWorker'>Pracownik</label>
                        <select id='taskWorker'>"
                            . $workersHtml .
                        "</select>
                </div>
                <div class='form-control'>
                    <label for='taskDate' >Termin</label>
                    <input id='taskDate' type='date' value='" . $taskDate . "'/>
                </div>
                <div class='form-control'>
                    <label for='taskDone' >Ukończone</label>
                    <input id='taskDone' type='checkbox' value='" . $taskDone . "'/>
                </div>
                <button type='submit' class='btn btn__big btn__primary'>Dodaj</button>
                </form>
        ";

        echo createModal($title, $body);
}
