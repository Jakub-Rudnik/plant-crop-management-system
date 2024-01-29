<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/TaskService.php';

$taskService = new TaskService();

$done = isset($_POST['done']);

$taskService->updateTask(
    intval($_POST['taskID']),
    $_POST['description'],
    intval($_POST['cultivationID']),
    $_POST['date'],
    $done,
    intval($_POST['workerID'])
);

include_once $_SERVER['DOCUMENT_ROOT'] . "/components/tasks/index.php";