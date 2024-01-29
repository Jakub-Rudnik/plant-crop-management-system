<?php
$conn = mysqli_connect('localhost', 'root', '', 'gardening');

class DatabaseConnection {
    private const hostname = 'localhost';
    private const username = 'root';
    private const password = '';
    private const database = 'gardening';
    private false | mysqli $conn;
    private bool | mysqli_result $result;

    function connect(): false | mysqli {
        $this->conn = mysqli_connect(self::hostname, self::username, self::password, self::database) or die(mysqli_error());
        return $this->conn;
    }

    function query(string $query, $RETURN_VALUE = true): array | false | null {
        $result = mysqli_query($this->conn, $query);

        if ($RETURN_VALUE) {
            $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $array;
        }

        return null;
    }

    function close():void {
        mysqli_close($this->conn);
    }
}