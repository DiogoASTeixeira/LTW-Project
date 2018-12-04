<?php 
include_once('../includes/session.php');
include_once('../templates/common/header.php');
if(isset($_SESSION['username']))
    include_once('../templates/profile/profile.php');
else{
    $_SESSION['msg'] = array('type' => 'warning', 'message' => 'Must be logged in before accessing the profile.');
    header("Location: ../index/index.php");
}

include_once('../templates/common/footer.php');
?>