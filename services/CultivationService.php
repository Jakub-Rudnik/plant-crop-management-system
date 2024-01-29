<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/entities/Variety.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/entities/Cultivation.php";

class CultivationService {
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseConnection();
    }

    /**
     * @return array<Cultivation>
     */
    public function getCultivations(): array {
        $array = [];
        $this->db->connect();
        $query = "SELECT c.cultivationID, c.name, c.humidity , c.quantity, c.temperature, c.watering, v.varietyID, v.name AS 'varietyName' FROM cultivations AS c, variety AS v WHERE c.varietyID = v.varietyID;";
        $result = $this->db->query($query);
        $this->db->close();

        foreach ($result as $row) {
            $variety = new Variety($row['varietyID'], $row['varietyName']);

            $array[] = new Cultivation($row['name'], $row['humidity'], $row['temperature'], $variety, $row['cultivationID'], $row['quantity'], $row['watering']);
        }

        return $array;
    }

    public function getCultivation(int $id): Cultivation {
        $this->db->connect();
        $query = "SELECT c.cultivationID, c.name, c.humidity , c.quantity, c.temperature, c.watering, v.varietyID, v.name AS 'varietyName' FROM cultivations AS c, variety AS v WHERE c.varietyID = v.varietyID AND c.cultivationID = $id";

        $result = $this->db->query($query)[0];
        $this->db->close();

        $variety = new Variety($result['varietyID'], $result['varietyName']);

        return new Cultivation($result['name'], $result['humidity'], $result['temperature'], $variety, $result['cultivationID'], $result['quantity'], $result['watering']);
    }

    public function addCultivation(string $name, int $varietyID, int $quantity, int $humidity, int $temperature): void {
        $this->db->connect();
        $query = "INSERT INTO cultivations (name, varietyID, humidity, quantity, temperature, watering) VALUES ('$name', $varietyID, $humidity, $quantity, $temperature, false)";

        $this->db->query($query, false);

        $this->db->close();
    }

    public function updateCultivation(int $cultivationID, string $name, int $varietyID, int $quantity, int $humidity, int $temperature): void {
        $this->db->connect();
        $query = "UPDATE cultivations SET name='$name', varietyID=$varietyID, humidity=$humidity, quantity=$quantity, temperature=$temperature WHERE cultivationID=$cultivationID";

        $this->db->query($query, false);

        $this->db->close();
    }

    public function deleteCultivation(int $cultivationID): void {
        $this->db->connect();
        $query = "DELETE FROM cultivations WHERE cultivationID=$cultivationID";

        $this->db->query($query, false);

        $this->db->close();
    }

    public function switchWatering(int $cultivationID, $watering): void {
        $watering = $watering ? 1 : 0;

        $this->db->connect();
        $query = "UPDATE cultivations SET watering=$watering WHERE cultivationID=$cultivationID";

        $this->db->query($query, false);

        $this->db->close();
    }
}