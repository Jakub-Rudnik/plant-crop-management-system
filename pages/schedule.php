<?php
$title = "Strona Główna | System Ogrodnictwa";
require_once "./includes/header.php"
?>
<div class="site__header">
    <h1>Harmonogram</h1>
    <button class="btn" title="Dodaj uprawę" onclick="createModal(addCropModal)">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="var(--text-800)" width="20" height="20">
            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
        <p>Dodaj zadanie</p>
    </button>
</div>


<div class="schedule">
    <div class="schedule__day">
        <h4>26.11.2023 (Niedziela)</h4>
        <div class="schedule__day__tasks">
            <p>Brak zdań</p>
        </div>
    </div>
    <div class="schedule__day">
        <h4>27.11.2023 (Wczoraj)</h4>
        <div class="schedule__day__tasks">
            <p>Brak zdań</p>
        </div>
    </div>
    <div class="schedule__day">
        <h4>Dzisiaj</h4>
        <div class="schedule__day__tasks">
            <p>Brak zdań</p>
        </div>
    </div>
    <div class="schedule__day">
        <h4>30.11.2023 (Czwartek)</h4>
        <div class="schedule__day__tasks">
            <div class="card">
                <h4 class="card__title">Podlać uprawę nr 24</h4>
                <div class="card__body">
                    <h5>Pracownik: </h5>
                    <p>Daniel Górnobrody</p>
                </div>
                <div class="task__hover">
                    <button class="btn btn__success" onclick="">Zakończ</button>
                    <button class="btn btn__accent" onclick="createModal(editCropModal)">Edytuj</button>
                    <button class="btn btn__danger" onclick="createModal(deleteTask)">Usuń</button>
                </div>
            </div>
            <div class="card">
                <h4 class="card__title">Podlać uprawę nr 24</h4>
                <div class="card__body">
                    <h5>Pracownik: </h5>
                    <p>Daniel Górnobrody</p>
                </div>
                <div class="task__hover">
                    <button class="btn btn__success" onclick="">Zakończ</button>
                    <button class="btn btn__accent" onclick="createModal(editCropModal)">Edytuj</button>
                    <button class="btn btn__danger" onclick="createModal(deleteTask)">Usuń</button>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
require_once "./includes/footer.php"
?>

