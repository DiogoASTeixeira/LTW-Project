<?php
include_once('../includes/session.php');
include_once('../templates/common/header.php');

if(!isset($_SESSION['username']))
    include_once('../templates/authentication/login.php');
else{
    //TODO can't login while logged in
    header("Location: ../index/index.php");
}
include_once('../templates/common/footer.php');
?>