<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/entities/Task.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/entities/Employee.php";
class TaskService
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseConnection();
    }

    /**
     * @return array<Task>
     */
    public function getTasks() {
        $array = [];
        $this->db->connect();
        $query = "SELECT t.taskID, t.description, t.date, t.done, c.name as cultivationName, c.cultivationID, w.forename, w.lastname, w.workerID FROM tasks as t, cultivations as c, workers as w WHERE t.cultivationID = c.cultivationID AND t.workerID = w.workerID ORDER BY t.date ASC;";
        $result = $this->db->query($query);
        $this->db->close();

        foreach ($result as $row) {
            $employee = new Employee($row['workerID'], $row['forename'], $row['lastname']);

            $array[] = new Task($row['taskID'], $employee, $row['description'], $row['cultivationID'], $row['date'], $row['done'], $row['cultivationName']);
        }

        return $array;
    }
    
    public function getTask(int $id): Task {
        $this->db->connect();
        $query = "SELECT t.taskID, t.description, t.date, t.done, c.name as cultivationName, c.cultivationID, w.forename, w.lastname, w.workerID FROM tasks as t, cultivations as c, workers as w WHERE t.cultivationID = c.cultivationID AND t.workerID = w.workerID AND t.taskID = $id;";
        $result = $this->db->query($query)[0];
        $this->db->close();

        $employee = new Employee(intval($result['workerID']), $result['forename'], $result['lastname']);
        return new Task(intval($result['taskID']), $employee, $result['description'], intval($result['cultivationID']), $result['date'], $result['done'], $result['cultivationName']);
    }

    public function updateTask(int $taskID, string $description, int $cultivationID, string $date, bool $done, int $workerID): void {
        $isTaskDone = $done ? 1 : 0;

        $this->db->connect();
        $query = "UPDATE tasks SET description = '$description', cultivationID = $cultivationID, date = '$date', done = $isTaskDone, workerID = $workerID WHERE taskID = $taskID;";

        $this->db->query($query, false);
        $this->db->close();
    }

    public function createTask(string $description, int $cultivationID, string $date, int $workerID): void {
        $this->db->connect();
        $query = "INSERT INTO tasks (description, cultivationID, date, done, workerID) VALUES ('$description', $cultivationID, '$date', 0, $workerID);";
        $this->db->query($query, false);
        $this->db->close();
    }

    public function deleteTask(int $id): void {
        $this->db->connect();
        $query = "DELETE FROM tasks WHERE taskID = $id;";
        $this->db->query($query, false);
        $this->db->close();
    }

    public function setTaskDone(int $id): void {
        $this->db->connect();
        $query = "UPDATE tasks SET done = 1 WHERE taskID = $id;";
        $this->db->query($query, false);
        $this->db->close();
    }
}