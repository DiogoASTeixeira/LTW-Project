<?php
include_once('../includes/session.php');
include_once('../database/users.php');

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_SESSION['username']))
{
    $_SESSION['msg'] = array('type' => 'warning', 'message' => 'You are already logged in.'); 
    header("Location: ../index/index.php");
}

if(!preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['msg'] = array('type' => 'error', 'message' => 'Username must only contain letters and numbers.');
    header('Location: ../authentication/register.php');
    die();
}

try {
    insertUser($username, $password);
    $_SESSION['msg'] = array('type' => 'success', 'message' => 'Successfully registered.');
    header('Location: ../authentication/login.php');
} catch(PDOException  $e){
    header('Location: ../authentication/register.php');
    $_SESSION['msg'] = array('type' => 'error', 'message' => 'Username already taken.');
    die($e->getMessage());
}
?>