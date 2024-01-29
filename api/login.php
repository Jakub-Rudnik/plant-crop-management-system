<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$databaseConnection = new DatabaseConnection();

if(!empty($email) && !empty($password) && !is_numeric($email)) {
    $databaseConnection->connect();
    $query = "select userID, email, password from users where email = '$email'";
    $result =  $databaseConnection->query($query)[0];
    $databaseConnection->close();
    if($result) {
        if(count($result)) {

            if(password_verify($password, $result['password'])) {

                $_SESSION['user_id'] = $result['userID'];
                header("Location: /");
            }
        }
    }

    echo "Zły login lub hasło!";
}