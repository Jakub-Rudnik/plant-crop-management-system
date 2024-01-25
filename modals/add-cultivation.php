<?php
require_once "../lib/db.php";
require_once "create-modal.php";

$varietiesHtml = "";

$query = "SELECT varietyID, name FROM variety";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $varietyId = $row['varietyID'];
        $varietyName = $row['name'];

        $varietiesHtml = $varietiesHtml . '<option value="' . $varietyId . '"' . '>' . $varietyName . '</option>';
    }
}

mysqli_close($conn);

$body = "
        <form onsubmit='return validateCropForm()'> 
        <div class='form-control'>
            <label for='cropName' >Nazwa uprawy</label>
            <input id='cropName' name='name' type='text'/>
        </div>
        <div class='form-control'>
            <label for='variant'>Odmiana</label>
                <select id='variant'>"
    . $varietiesHtml .
    "</select>
        </div>
        <div class='form-control'>
            <label for='quantity'>Wielkość uprawy</label>
            <input id='quantity' name='quantity' type='number'/>
        </div>
        <div class='form-control'>
            <label for='humidity'>Wilgotność</label>
            <input id='humidity' name='humidity' type='number'/>
        </div>
        <button type='submit' class='btn btn__big btn__primary'>Dodaj</button>
        </form>
";

echo createModal("Dodaj uprawę", $body);