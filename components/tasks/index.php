<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/TaskService.php';

$taskService = new TaskService();

$tasks = $taskService->getTasks();

$tasksHtml = "";

foreach ($tasks as $task) {
    $taskDone = $task->done ? "task__done" : "";
    $taskDateFormatted = date_format(date_create($task->date), "d.m.Y");
    $markTaskDoneBtn = $task->done ? "" : "<button class='btn btn__success' hx-get='./api/set-task-done.php?id=$task->taskID' hx-target='#tasks' hx-swap='innerHTML'>Zakończ</button>";


    $tasksHtml = $tasksHtml . "
        <div class='card $taskDone'>
            <h4 class='card__title'>$task->description</h4>
            <div class='card__body'>
                <p>Termin: $taskDateFormatted</p>
                <p>Pracownik: " . $task->employee->forename . " " . $task->employee->lastname . "</p>
            </div>
            <div class='task__hover'>
                " . $markTaskDoneBtn . "
                <button class='btn btn__accent' hx-get='./components/modals/update-task.php?id=$task->taskID' hx-target='body' hx-swap='afterbegin'>Edytuj</button>
                <button class='btn btn__danger' hx-get='./components/modals/delete-task.php?id=$task->taskID' hx-target='body' hx-swap='afterbegin'>Usuń</button>
            </div>
        </div>
    ";
}

echo $tasksHtml;