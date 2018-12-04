<?php
include_once('../includes/session.php');
include_once('../templates/common/header.php');

if(!isset($_SESSION['username']))
    include_once('../templates/authentication/login.php');
else{
    $_SESSION['msg'] = array('type' => 'warning', 'message' => 'You are already logged in.');
    header("Location: ../index/index.php");
}
include_once('../templates/common/footer.php');
?>