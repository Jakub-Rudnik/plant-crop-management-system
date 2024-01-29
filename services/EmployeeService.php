<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/entities/Employee.php";
class EmployeeService
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseConnection();
    }

    /**
     * @return array<Employee>
     */
    public function getEmployees() {
        $array = [];
        $this->db->connect();
        $query = "SELECT w.workerID, w.forename, w.lastname FROM workers as w";
        $result = $this->db->query($query);
        $this->db->close();

        foreach ($result as $row) {
            $array[] = new Employee($row['workerID'], $row['forename'], $row['lastname']);
        }

        return $array;
    }
}