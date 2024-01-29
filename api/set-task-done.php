<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/services/TaskService.php';

$taskService = new TaskService();
$taskService->setTaskDone(intval($_GET['id']));

include_once $_SERVER['DOCUMENT_ROOT'] . "/components/tasks/index.php";