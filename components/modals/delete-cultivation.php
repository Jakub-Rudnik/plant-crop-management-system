<?php
require_once "create-modal.php";

$id = $_GET['id'];
$title = "Usuń uprawę";

$body = "
        <div style='display: flex; flex-direction: column; gap: 15px; align-items: center; justify-content: center; padding-top: 25px; width: 100%'>
            <button id='cancelBtn' class='btn btn__secondary btn__big' style='width: 100%' onclick='closeModal()'>Anuluj</button> 
            <button id='deleteBtn' class='btn btn__danger btn__big' style='width: 100%;' hx-get='../../api/delete-cultivation.php?id=$id'  hx-replace-url='/uprawy' hx-on::after-request='window.location.reload()'>Usuń</button> 
        </div>
       
";

echo createModal($title, $body);
