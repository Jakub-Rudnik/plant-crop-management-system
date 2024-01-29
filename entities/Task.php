<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/entities/Employee.php";

class Task
{
    public int $taskID;
    public Employee $employee;
    public string $description;
    public int $cultivationID;
    public string $cultivationName;
    public string $date;
    public bool $done;

    public function __construct(int $taskID, Employee $employee, string $description, int $cultivationID, string $date, bool $done, string $cultivationName)
    {
        $this->taskID = $taskID;
        $this->employee = $employee;
        $this->description = $description;
        $this->cultivationID = $cultivationID;
        $this->date = $date;
        $this->done = $done;
        $this->cultivationName = $cultivationName;
    }
}