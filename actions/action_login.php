<?php
include_once('../includes/session.php'); // connects to the database
include_once('../database/users.php');      // loads the functions responsible for the users table

$username = $_POST['username'];
$password = $_POST['password'];

if(!preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['msg'] = array('type' => 'error', 'message' => 'Username must only contain letters and numbers.');
    header('Location: ../authentication/login.php');
    die();
}

if (validateUser($username, $password)) {  // test if user exists
    $_SESSION['username'] = $username;  // store the username in Session
    $_SESSION['msg'] = array('type' => 'success', 'message' => 'Logged in successfully.');

    header("Location:../index/index.php");

} else {
    $_SESSION['msg'] = array('type' => 'error', 'message' => 'The input username and password do not match.');
    header("Location:../authentication/login.php");
}
die();
?>