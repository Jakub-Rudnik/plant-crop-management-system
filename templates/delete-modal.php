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
                <div style='display: flex; gap: 15px; align-items: center; justify-content: center'>
                    <button id='cancelBtn' class='btn btn__secondary'>Anuluj</button> 
                    <button id='deleteBtn' class='btn btn__danger'>Usuń</button> 
                </div>
               
        ";

        echo createModal($title, $body);
}
