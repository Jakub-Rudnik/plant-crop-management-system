<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/CultivationService.php';

$cultivationService = new CultivationService();

$cultivations = $cultivationService->getCultivations();

$html = "";

foreach ($cultivations as $cultivation) {
    $html = $html . "
                <div class='card'>
                    <h3 class='card__title'>
                        " . $cultivation->name . "
                    </h3>
                    <div class='card__body'>
                        <h5>Aktulane parametry:</h5>
                        <p class='parameters'>Wielkość uprawy: " . $cultivation->quantity . "</p>
                        <p class='parameters'>Wiglotność podłoża: " . $cultivation->humidity . "%</p>
                    </div>
                    <div class='card__footer'>
                        <a class='btn btn__primary' href='/uprawa/" . $cultivation->cultivationID . "'>Przejdź</a>
                        <a class='btn btn__accent' hx-get='./components/modals/update-cultivation.php?id=" . $cultivation->cultivationID . "&returnAllCultivations=1' hx-target='body' hx-swap='afterbegin' >Edytuj</a>
                    </div>
                </div>";
}

echo $html;