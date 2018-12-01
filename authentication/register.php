<?php
include_once('../includes/session.php');
include_once('../templates/common/header.php');

if(!isset($_SESSION['username']))
    include_once('../templates/authentication/register.php');
else{
    //TODO can't register while logged in
    header("Location: ../index/index.php");
}
include_once('../templates/common/footer.php'); 
?> 