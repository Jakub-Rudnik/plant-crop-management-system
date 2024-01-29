<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';

$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$databaseConnection = new DatabaseConnection();

if(!empty($email) && !empty($password) && !is_numeric($email)) {
    $databaseConnection->connect();
    $query = "select email from users where email = '$email'";
    $result =  $databaseConnection->query($query);

    if($result) {
        if(count($result)) {
            echo "Użytkownik o takiej nazwie już istnieje!";
        }
    } else {
        if($password === $confirm_password) {
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $query = "insert into users (email, password) values ('$email', '$passwordHash')";
            $databaseConnection->query($query, false);
            Header("Location: /login");
        } else {
            echo "Hasła nie są takie same!";
        }
    }
    $databaseConnection->close();
} else {
    echo "Wypełnij wszystkie pola!";
}