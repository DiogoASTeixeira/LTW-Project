<?php
include_once('../includes/session.php');
include_once('../database/users.php');

$username = $_POST['username'];
$password = $_POST['password'];

if(!preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    //TODO message invalid characters
    header('Location: ../authentication/register.php');
    die();
}

try {
    insertUser($username, $password);
    // TODO message user created
    header('Location: ../authentication/login.php');
} catch(PDOException  $e){
    header('Location: ../authentication/register.php');
    //TODO message Failed to register
    die($e->getMessage());
}
?>