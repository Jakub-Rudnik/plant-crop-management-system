<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';

function checkIfUserIsLoggedIn():string | null {
    if(!isset($_SESSION['user_id'])) {
        header("Location: /login");
        return null;
    }

    $databaseConnection = new DatabaseConnection();
    $databaseConnection->connect();
    $query = "select email from users where userID = " . $_SESSION['user_id'];
    $result = $databaseConnection->query($query)[0];
    $databaseConnection->close();

    if($result) {
        return $result['email'];
    }

    return null;
}
