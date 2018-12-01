<?php
include_once('../includes/session.php');
include_once('../database/users.php');

$username = $_SESSION['username'];
$oldPassword = $_POST["oldPassword"];
$newPassword = $_POST["newPassword"];
$confirmPassword = $_POST["confirmPassword"];

if($confirmPassword !== $newPassword)
{
    //TODO Passwords dont match
    echo "wrong";
    die();
}

if(!validateUser($username, $oldPassword))
{
    //TODO incorrect Old Password 
    echo "bad";
    die();
}

changePassword($username, $newPassword);

header("Location:../profile/profile.php");
die();





?>