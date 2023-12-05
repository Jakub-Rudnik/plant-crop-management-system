<?php
$title = "Strona Główna | System Ogrodnictwa";
require_once "./lib/functions.php";
require_once "./includes/header.php";

$crops = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/crops.json'), true);
$varieties = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/varieties.json'), true);
$request = explode('/', $_SERVER['REQUEST_URI']);

$crop = find($crops, $request[2]);
$cropId = $crop['id'] ?? 0;

$variety = find($varieties, $cropId);

?>
<h1><?=$crop['name'] ?? ""?></h1>

<div class="card__wrapper max_2_cards">
    <div class="card no__hover">
        <div class="card__title">
            Informacje
        </div>
        <div class="card__body">
            <table>
                <tr>
                    <td>Odmiana</td>
                    <td><?=$variety['name'] ?? ""?></td>
                </tr>
                <tr>
                    <td>Wielokość uprawy</td>
                    <td><?=$crop['quantity'] ?? 0?></td>
                </tr>
                <tr>
                    <td>Wilgotność podłoża</td>
                    <td><?=$crop['humidity'] ?? 0?></td>
                </tr>
                <tr>
                    <td>Temperatura</td>
                    <td><?=$crop['temperature'] ?? 0?><span>&#8451;</span></td>
                </tr>
                <tr class="<?=($crop['watering'] ?? 0) ? "watering__on" : ""?>">
                    <td>Podlewanie</td>
                    <td><?=($crop['watering'] ?? 0) ? "W trakcie" : "Wyłączone"?></td>
                </tr>
            </table>
            <div class="card__title" style="padding-top: 50px">
                Akcje
            </div>
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 15px; padding-top: 10px">
                <button class="btn btn__primary">
                    <?=($crop['watering'] ?? 0) ? "Wyłącz" : "Włącz"?> podlewanie</button>
                <button class="btn btn__accent" onclick="createModal('crop-edit', <?=$cropId?>)">Edytuj</button>
                <button class="btn btn__danger" onclick="createModal('crop-delete', <?=$cropId?>)">Usuń</button>
            </div>

        </div>
    </div>
</div>


<?php
require_once "./includes/footer.php"
?>

