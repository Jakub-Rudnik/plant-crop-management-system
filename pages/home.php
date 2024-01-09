<?php
    $title = "Strona Główna | System Ogrodnictwa";
    require_once "./includes/header.php";

    $crops = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/crops.json'), true);
    $workers = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/workers.json'), true);
    $varieties = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/varieties.json'), true);
    $tasks = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/tasks.json'), true);

?>
<h1>Strona Główna</h1>

<div class="card__wrapper">
    <div class="card">
        <h3 class="card__title">
            Uprawy
        </h3>
        <div class="card__body">
            <p class="fontXXL"><?=count($crops)?></p>
        </div>
        <div class="card__footer">
            <a class="btn btn__primary" href="/uprawy">Przejdź</a>
        </div>
    </div>
    <div class="card">
        <h3 class="card__title">
            Pracownicy
        </h3>
        <div class="card__body">
            <p class="fontXXL"><?=count($workers)?></p>
        </div>
        <div class="card__footer">
            <a class="btn btn__primary" href="/pracownicy">Przejdź</a>
        </div>
    </div>
    <div class="card">
        <h3 class="card__title">
           Odmiany
        </h3>
        <div class="card__body">
            <p class="fontXXL"><?=count($varieties)?></p>
        </div>
    </div>
    <div class="card">
        <h3 class="card__title">
           Zadania
        </h3>
        <div class="card__body">
            <p class="fontXXL"><?=count($tasks)?></p>
        </div>
        <div class="card__footer">
            <a class="btn btn__primary" href="/zadania">Przejdź</a>
        </div>
    </div>
</div>

<?php
require_once "./includes/footer.php"
?>