<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/TaskService.php';

$taskService = new TaskService();
$taskService->createTask(
    $_POST['description'],
    intval($_POST['cultivationID']),
    $_POST['date'],
    intval($_POST['workerID'])
);

include_once $_SERVER['DOCUMENT_ROOT'] . "/components/tasks/index.php";