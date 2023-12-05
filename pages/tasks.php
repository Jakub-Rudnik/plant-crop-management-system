<?php
$title = "Strona Główna | System Ogrodnictwa";
require_once "./includes/header.php";
require_once "./lib/functions.php";
?>
<div class="site__header">
    <h1>Zadania</h1>
    <button class="btn" title="Dodaj uprawę" onclick="createModal('task-add')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="var(--text-800)" width="20" height="20">
            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
        <span>Dodaj zadanie</span>
    </button>
</div>

<?php
$tasks = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/tasks.json'), true);
$workers = json_decode(file_get_contents(dirname('index.php') . '/mockup-data/workers.json'), true);

usort($tasks, function($a, $b)
{
    return strcmp($a['date'], $b['date']);
});
?>

<div class="card__wrapper">
    <?php
        foreach ($tasks as $task):
        $workerId = $task['worker_id'] ?? '';
        $worker = find($workers, $workerId);

        $workerFirstName = $worker['forename'] ?? '';
        $workerLastName = $worker['lastname'] ?? '';

        $taskId = $task['id'] ?? 0;
        $taskDesc = $task['description'] ?? '';
        $taskDate = $task['date'] ?? '';
        $taskDateFormatted = date_create($taskDate);
        $taskDone = $task['done'] ?? 0;
    ?>
    <div class="card <?=$taskDone ? "task__done" : ""?>">
        <h4 class="card__title"><?=$taskDesc?></h4>
        <div class="card__body">
            <p>Termin: <?=date_format($taskDateFormatted, "d.m.Y")?></p>
            <p>Pracownik: <?=$workerFirstName . " " . $workerLastName?></p>
        </div>
        <div class="task__hover">
            <button class="btn btn__success" onclick="">Zakończ</button>
            <button class="btn btn__accent" onclick="createModal('task-edit', <?=$taskId?>)">Edytuj</button>
            <button class="btn btn__danger" onclick="createModal('task-delete', <?=$taskId?>)">Usuń</button>
        </div>
    </div>
    <?php
        endforeach;
    ?>
</div>



<?php
require_once "./includes/footer.php"
?>

