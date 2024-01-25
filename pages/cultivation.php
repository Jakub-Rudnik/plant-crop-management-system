<?php
$title = "Strona Główna | System Ogrodnictwa";
require_once "./lib/functions.php";
require_once "./includes/header.php";
require_once "./lib/db.php";

$request = explode('/', $_SERVER['REQUEST_URI']);
$id = $request[2];

$cultivation = getCultivation($conn, (int)$id);

?>
<h1><?=$cultivation['name'] ?? ""?></h1>

<div class="card__wrapper max_2_cards">
    <div class="card no__hover">
        <div class="card__title">
            Informacje
        </div>
        <div class="card__body">
            <table>
                <tr>
                    <td>Odmiana</td>
                    <td><?=$cultivation['variety_name'] ?? ""?></td>
                </tr>
                <tr>
                    <td>Wielokość uprawy</td>
                    <td><?=$cultivation['quantity'] ?? 0?></td>
                </tr>
                <tr>
                    <td>Wilgotność podłoża</td>
                    <td><?=$cultivation['humidity'] ?? 0?></td>
                </tr>
                <tr>
                    <td>Temperatura</td>
                    <td><?=$cultivation['temperature'] ?? 0 ?><span>&#8451;</span></td>
                </tr>
                <tr class="<?=($cultivation['watering'] ?? 0) ? "watering__on" : ""?>">
                    <td>Podlewanie</td>
                    <td><?=($cultivation['watering'] ?? 0) ? "W trakcie" : "Wyłączone"?></td>
                </tr>
            </table>
            <div class="card__title" style="padding-top: 50px">
                Akcje
            </div>
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 15px; padding-top: 10px">
                <button class="btn btn__primary">
                    <?=($cultivation['watering'] ?? 0) ? "Wyłącz" : "Włącz"?> podlewanie</button>
                <button class="btn btn__accent" onclick="createModal('crop-edit', <?=$id?>)">Edytuj</button>
                <button class="btn btn__danger" onclick="createModal('crop-delete', <?=$id?>)">Usuń</button>
            </div>

        </div>
    </div>
</div>


<?php
require_once "./includes/footer.php"
?>

