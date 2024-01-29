<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/CultivationService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/VarietyService.php';
include_once 'create-modal.php';

$id = $_GET["id"];
$returnAllCultivations = $_GET['returnAllCultivations'];

$varietiesHtml = "";
$hxTarget = $returnAllCultivations ? "#cultivations" : "#cultivation";

$cultivationService = new CultivationService();
$varietiesService = new VarietyService();

$cultivation = $cultivationService->getCultivation($id);
$varieties = $varietiesService->getVarieties();

foreach ($varieties as $variety) {
    $varietiesHtml = $varietiesHtml . '<option value="' . $variety->varietyID . '"' . ($variety->varietyID == $cultivation->cultivationID ? "selected" : " ") . '>' . $variety->name . '</option>';
}

$body = "
        <form hx-post='../../api/update-cultivation.php?returnAllCultivations=" . $returnAllCultivations . "' hx-on::after-request='closeModal()' hx-target='" . $hxTarget ."'>
        <input value='$id' hidden name='cultivationID' type='number' /> 
        <div class='form-control'>
            <label for='cropName' >Nazwa uprawy</label>
            <input id='cropName' name='name' type='text' value='" . $cultivation->name. "' required/>
        </div>
        <div class='form-control'>
            <label for='varietyID'>Odmiana</label>
             <select id='varietyID' name='varietyID'>"
            . $varietiesHtml .
            "</select>
        </div>
        <div class='form-control'>
            <label for='quantity'>Wielkość uprawy</label>
            <input id='quantity' name='quantity' type='number' value='" . $cultivation->quantity . "' required/>
        </div>
        <div class='form-control'>
            <label for='humidity'>Wilgotność</label>
            <input id='humidity' name='humidity' type='number' value='" . $cultivation->humidity . "' required/>
        </div>
        <div class='form-control'>
            <label for='temperature'>Temperatura</label>
            <input id='temperature' name='temperature' type='number' value='" . $cultivation->temperature . "' required/>
        </div>
        <button type='submit' class='btn btn__big btn__primary'>Edytuj</button>
        </form>
";

echo createModal("Edytuj uprawę", $body);