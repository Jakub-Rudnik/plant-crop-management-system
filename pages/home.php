<?php
    $title = "Strona Główna | System Ogrodnictwa";
    require_once "./includes/header.php"
?>
<h1>Strona Główna</h1>

<div class="card__wrapper">
    <div class="card">
        <h3 class="card__title">
            Uprawy
        </h3>
        <div class="card__body">
            <p class="fontXXL">13</p>
        </div>
        <div class="card__footer">
            <a class="card__footer__btn" href="/uprawy">Przejdź</a>
        </div>
    </div>
    <div class="card">
        <h3 class="card__title">
            Pracownicy
        </h3>
        <div class="card__body">
            <p class="fontXXL">5</p>
        </div>
        <div class="card__footer">
            <a class="card__footer__btn" href="/uprawy">Przejdź</a>
        </div>
    </div>
</div>

<?php
require_once "./includes/footer.php"
?>