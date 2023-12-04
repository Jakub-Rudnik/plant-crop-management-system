<?php
$title = "Strona Główna | System Ogrodnictwa";
require_once "./includes/header.php"
?>
<div class="site__header">
    <h1>Pracownicy</h1>
    <button class="btn" title="Dodaj uprawę" onclick="createModal('worker-add')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="var(--text-800)" width="20" height="20">
            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
        <span>Dodaj pracownika</span>
    </button>
</div>

<?php
$workers = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/workers.json'), true);
?>
<div class="card__wrapper">
    <?php
    foreach ($workers as $worker):
        $workerId = $worker['id'] ?? 0;

        $editBtn = '<a class="btn btn__accent" onclick="createModal(\'worker-edit' . '\', ' . $workerId . ')">Edytuj</a>';

        ?><div class='card'>
                <h3 class='card__title'>
                    <?=$worker['forename'] . " " . $worker['lastname']?>
                </h3>
                <div class='card__body'>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="var(--text-800)" width="36" height="36">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class='card__footer'><?=$editBtn?></div>
            </div>
    <?php endforeach; ?>
</div>

<?php
require_once "./includes/footer.php"
?>


