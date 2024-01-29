<?php
require_once "create-modal.php";
include_once $_SERVER['DOCUMENT_ROOT'] . './services/VarietyService.php';

$varietiesHtml = "";

$varietiesService = new VarietyService();

$varieties = $varietiesService->getVarieties();

foreach ($varieties as $variety) {
    $varietiesHtml = $varietiesHtml . '<option value="' . $variety->varietyID . '"' . '>' . $variety->name . '</option>';
}


$body = "
        <form hx-post='./api/add-cultivation.php' hx-target='#cultivations' hx-swap='innerHTML' hx-on::after-request='closeModal()'> 
        <div class='form-control'>
            <label for='cropName' >Nazwa uprawy</label>
            <input id='cropName' name='name' type='text' required/>
        </div>
        <div class='form-control'>
            <label for='varietyID'>Odmiana</label>
            <select id='varietyID' name='varietyID' required>"
            . $varietiesHtml .
            "</select>
        </div>
        <div class='form-control'>
            <label for='quantity'>Wielkość uprawy</label>
            <input id='quantity' name='quantity' type='number' required/>
        </div>
        <div class='form-control'>
            <label for='humidity'>Wilgotność</label>
            <input id='humidity' name='humidity' type='number' required/>
        </div>
        <div class='form-control'>
            <label for='temperature'>Temperatura</label>
            <input id='temperature' name='temperature' type='number' required/>
        </div>
        <button type='submit' class='btn btn__big btn__primary'>Dodaj</button>
        </form>
";

echo createModal("Dodaj uprawę", $body);