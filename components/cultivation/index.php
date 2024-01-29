<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/services/CultivationService.php";

$id = $_GET['id'];

$cultivationService = new CultivationService();

$cultivation = $cultivationService->getCultivation($id);

$wateringClass = ($cultivation->watering ?? 0) ? 'watering__on' : '';
$wateringText = ($cultivation->watering ?? 0) ? 'W trakcie' : 'Wyłączone';
$wateringBtnText = ($cultivation->watering ?? 0) ? 'Wyłącz' : 'Włącz';

echo "<h1>" . $cultivation->name . "</h1>
<div class='card__wrapper max_2_cards'>
    <div class='card no__hover'>
        <div class='card__title'>
            Informacje
        </div>
        <div class='card__body'>
            <table>
                <tr>
                    <td>Odmiana</td>
                    <td>" . $cultivation->variety->name . "</td>
                </tr>
                <tr>
                    <td>Wielokość uprawy</td>
                    <td>" . $cultivation->quantity . "</td>
                </tr>
                <tr>
                    <td>Wilgotność podłoża</td>
                    <td>" . $cultivation->humidity . "</td>
                </tr>
                <tr>
                    <td>Temperatura</td>
                    <td>" . $cultivation->temperature . "<span>&#8451;</span></td>
                </tr>
                <tr class='" . $wateringClass . "'>
                    <td>Podlewanie</td>
                    <td>" . $wateringText . "</td>
                </tr>
            </table>
            <div class='card__title' style='padding-top: 50px'>
                Akcje
            </div>
            <div style='display: flex; align-items: center; justify-content: space-between; gap: 15px; padding-top: 10px'>
                <button class='btn btn__primary' hx-get='../../api/switch-watering.php?id=$cultivation->cultivationID&watering=$cultivation->watering' hx-target='#cultivation' hx-swap='innerHTML'>
                    " . $wateringBtnText . " podlewanie</button>
                <button class='btn btn__accent' hx-get='../../components/modals/update-cultivation.php?id=$cultivation->cultivationID&returnAllCultivations=0' hx-target='body' hx-swap='afterbegin'>Edytuj</button>
                <button class='btn btn__danger' hx-get='../../components/modals/delete-cultivation.php?id=$cultivation->cultivationID' hx-target='body' hx-swap='afterbegin'>Usuń</button>
            </div>
        </div>
    </div>
</div>";