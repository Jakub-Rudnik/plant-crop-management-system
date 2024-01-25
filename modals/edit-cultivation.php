<?php
require_once "../lib/db.php";
require_once "create-modal.php";

$id = $_GET["id"];

$varietiesHtml = "";
$query = "SELECT varietyID, name FROM variety";
$result = mysqli_query($conn, $query);
$cultivation = getCultivation($conn, $id);

if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $varietyId = $row['varietyID'];
        $varietyName = $row['name'];

        $varietiesHtml = $varietiesHtml . '<option value="' . $varietyId . '"' . ($varietyId == $cultivation['varietyID'] ? "selected" : " ") . '>' . $varietyName . '</option>';
    }
}

$body = "
        <form onsubmit='return validateCropForm()'> 
        <div class='form-control'>
            <label for='cropName' >Nazwa uprawy</label>
            <input id='cropName' name='name' type='text' value='" . $cultivation['name']. "'/>
        </div>
        <div class='form-control'>
            <label for='variant'>Odmiana</label>
                <select id='variant'>"
    . $varietiesHtml .
    "</select>
        </div>
        <div class='form-control'>
            <label for='quantity'>Wielkość uprawy</label>
            <input id='quantity' name='quantity' type='number' value='" . $cultivation['quantity'] . "'/>
        </div>
        <div class='form-control'>
            <label for='humidity'>Wilgotność</label>
            <input id='humidity' name='humidity' type='number' value='" . $cultivation['humidity'] . "'/>
        </div>
        <button type='submit' class='btn btn__big btn__primary'>Dodaj</button>
        </form>
";

echo createModal("Edytuj uprawę", $body);