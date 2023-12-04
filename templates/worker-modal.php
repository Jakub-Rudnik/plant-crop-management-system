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

        $workers = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/workers.json'), true);

        $worker = find($workers, $id);

        $workerForeName = $worker['forename'] ?? '';
        $workerLastName = $worker['lastname'] ?? '';

        $body = "
                <form>
                    <div class='form-control'>
                        <label for='workerForeName' >Imię</label>
                        <input id='workerForeName' type='text' value='" . $workerForeName . "'/>
                    </div>
                    <div class='form-control'>
                        <label for='workerLastName'>Nazwisko</label>
                        <input id='workerLastName' type='text' value='" . $workerLastName . "'/>
                    </div>
                    <button type='submit' class='btn btn__big btn__primary'>Dodaj</button>
                </form>
        ";


        echo createModal($title, $body);
}
