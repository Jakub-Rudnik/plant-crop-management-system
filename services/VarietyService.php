<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lib/db.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/entities/Variety.php";

class VarietyService
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseConnection();
    }

    /**
     * @return array<Variety>
     */
    public function getVarieties(): array {
        $array = [];
        $this->db->connect();
        $query = "SELECT v.varietyID, v.name AS 'varietyName' FROM variety AS v";
        $result = $this->db->query($query);

        foreach ($result as $row) {
            $array[] = new Variety($row['varietyID'], $row['varietyName']);

        }

        return $array;
    }
}