<?php
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

        $body = "
                <div style='display: flex; flex-direction: column; gap: 15px; align-items: center; justify-content: center; padding-top: 25px; width: 100%'>
                    <button id='cancelBtn' class='btn btn__secondary btn__big' style='width: 100%'>Anuluj</button> 
                    <button id='deleteBtn' class='btn btn__danger btn__big' style='width: 100%;'>Usuń</button> 
                </div>
               
        ";

        echo createModal($title, $body);
}
