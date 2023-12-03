<?php
$PAGE_TITLE = "Uprawa 24";
require_once "./includes/header.php"
?>
<div class="site__header">
    <h1>Uprawy</h1>
    <button class="btn" title="Dodaj uprawę" onclick="createModal(addCropModal)">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="var(--text-800)" width="20" height="20">
            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
        <p>Dodaj uprawę</p>
    </button>
</div>

<div class="card__wrapper">
    <div class="card">
        <h3 class="card__title">
            Chyzantemy złociste
        </h3>
        <div class="card__body">
            <h5>Aktulane parametry:</h5>
            <p class="parameters">Wielkość uprawy: 1500</p>
            <p class="parameters">Wiglotność podłoża: 76%</p>
        </div>
        <div class="card__footer">
            <a class="btn btn__primary" href="/uprawa/1">Przejdź</a>
            <a class="btn btn__accent" onclick="createModal(editCropModal)">Edytuj</a>
        </div>
    </div>
    <div class="card">
        <h3 class="card__title">
            Bratek Szwajciarki Żółty
        </h3>
        <div class="card__body">
            <h5>Aktulane parametry:</h5>
            <p class="parameters">Wielkość uprawy: 300</p>
            <p class="parameters">Wiglotność podłoża: 100%</p>
        </div>
        <div class="card__footer">
            <a class="btn btn__primary" href="/uprawa/1">Przejdź</a>
            <a class="btn btn__accent" onclick="createModal(editCropModal)">Edytuj</a>
        </div>
    </div>
    <div class="card">
        <h3 class="card__title">
            Bratek Wielokwiatowy Black Knight
        </h3>
        <div class="card__body">
            <h5>Aktulane parametry:</h5>
            <p class="parameters">Wielkość uprawy: 471</p>
            <p class="parameters">Wiglotność podłoża: 87%</p>
        </div>
        <div class="card__footer">
            <a class="btn btn__primary" href="/uprawa/1">Przejdź</a>
            <a class="btn btn__accent" onclick="createModal(editCropModal)">Edytuj</a>
        </div>
    </div>
    <div class="card">
        <h3 class="card__title">
            Chyzantemy złociste
        </h3>
        <div class="card__body">
            <h5>Aktulane parametry:</h5>
            <p class="parameters">Wielkość uprawy: 1500</p>
            <p class="parameters">Wiglotność podłoża: 76%</p>
        </div>
        <div class="card__footer">
            <a class="btn btn__primary" href="/uprawa/1">Przejdź</a>
            <a class="btn btn__accent" onclick="createModal(editCropModal)">Edytuj</a>
        </div>
    </div>
    <div class="card">
        <h3 class="card__title">
            Bratek Szwajciarki Żółty
        </h3>
        <div class="card__body">
            <h5>Aktulane parametry:</h5>
            <p class="parameters">Wielkość uprawy: 300</p>
            <p class="parameters">Wiglotność podłoża: 100%</p>
        </div>
        <div class="card__footer">
            <a class="btn btn__primary" href="/uprawa/1">Przejdź</a>
            <a class="btn btn__accent" onclick="createModal(editCropModal)">Edytuj</a>
        </div>
    </div>
    <div class="card">
        <h3 class="card__title">
            Bratek Wielokwiatowy Black Knight
        </h3>
        <div class="card__body">
            <h5>Aktulane parametry:</h5>
            <p class="parameters">Wielkość uprawy: 471</p>
            <p class="parameters">Wiglotność podłoża: 87%</p>
        </div>
        <div class="card__footer">
            <a class="btn btn__primary" href="/uprawa/1">Przejdź</a>
            <a class="btn btn__accent" onclick="createModal(editCropModal)">Edytuj</a>
        </div>
    </div>
</div>
<?php
require_once "./includes/footer.php"
?>
