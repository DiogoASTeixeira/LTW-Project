<?php
include_once('../includes/session.php');
include_once('../database/users.php');

$username = $_SESSION['username'];
$oldPassword = $_POST["oldPassword"];
$newPassword = $_POST["newPassword"];
$confirmPassword = $_POST["confirmPassword"];

if($confirmPassword !== $newPassword)
{
    $_SESSION['msg'] = array('type' => 'error', 'message' => 'Passwords don\'t match.');
    header("Location:../profile/profile.php");
    die();
}

if(!validateUser($username, $oldPassword))
{
    $_SESSION['msg'] = array('type' => 'error', 'message' => 'Old password is incorrect.');
    header("Location:../profile/profile.php");
    die();
}

changePassword($username, $newPassword);

$_SESSION['msg'] = array('type' => 'success', 'message' => 'Password changed successfully.');
header("Location:../profile/profile.php");
die();





?>