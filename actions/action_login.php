<?php
include_once('../includes/session.php'); // connects to the database
include_once('../database/users.php');      // loads the functions responsible for the users table

$username = $_POST['username'];
$password = $_POST['password'];

if(!preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    //TODO message invalid characters
    header('Location: ../authentication/login.php');
    die();
}

if (validateUser($username, $password)) {  // test if user exists
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;  // store the username in Session
    // TODO message logged in
    header("Location:../index/index.php");
} else {
    //TODO Add warning for invalid login
    header("Location:../authentication/login.php");
}
die();
?>