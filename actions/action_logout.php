<?php
include_once('../includes/session.php');
// remove all session variables
session_unset();

// destroy the session
session_destroy();

session_start();
$_SESSION['msg'] = array('type' => 'success', 'message' => 'Logged out.');

header("Location: ../authentication/login.php");
die();
?>