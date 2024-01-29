<?php
require_once "create-modal.php";

$id = $_GET['id'];
$title = "Usuń zadanie";

$body = "
        <div style='display: flex; flex-direction: column; gap: 15px; align-items: center; justify-content: center; padding-top: 25px; width: 100%'>
            <button id='cancelBtn' class='btn btn__secondary btn__big' style='width: 100%' onclick='closeModal()'>Anuluj</button> 
            <button id='deleteBtn' class='btn btn__danger btn__big' style='width: 100%;' hx-get='../../api/delete-task.php?id=$id' hx-target='#tasks' hx-swap='innerHTML' hx-on::after-request='closeModal()'>Usuń</button> 
        </div>
       
";

echo createModal($title, $body);