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
        $varieties = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/varieties.json'), true);

        $crop = find($crops, $id);

        $varietiesHtml = "";
        $cropVariety = $crop['variety'] ?? 0;

        foreach ($varieties as $variety) {
            $varietyId = $variety['id'] ?? 0;
            $varietyName = $variety['name'] ?? '';

            $varietiesHtml = $varietiesHtml . '<option value="' . $varietyId . '"' . ($varietyId == $cropVariety ? "selected" : " ") . '>' . $varietyName . '</option>';
        }

        $cropName = $crop['name'] ?? '';
        $cropQuantity = $crop['quantity'] ?? 0;
        $cropHumidity = $crop['humidity'] ?? 0;

        $body = "
                <form>
                <div class='form-control'>
                    <label for='cropName' >Nazwa uprawy</label>
                    <input id='cropName' type='text' value='" . $cropName. "'/>
                </div>
                <div class='form-control'>
                    <label for='variant'>Odmiana</label>
                        <select id='variant'>"
            . $varietiesHtml .
            "</select>
                </div>
                <div class='form-control'>
                    <label for='quantity'>Wielkość uprawy</label>
                    <input id='quantity' type='number' value='" . $cropQuantity . "'/>
                </div>
                <div class='form-control'>
                    <label for='humidity'>Wilgotność</label>
                    <input id='humidity' type='number' value='" . $cropHumidity . "'/>
                </div>
                <button type='submit' class='btn btn__big btn__primary'>Dodaj</button>
                </form>
        ";

        echo createModal($title, $body);
}