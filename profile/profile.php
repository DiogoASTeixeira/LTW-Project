<?php 
include_once('../includes/session.php');
include_once('../templates/common/header.php');
if(isset($_SESSION['username']))
    include_once('../templates/profile/profile.php');
else{
    //TODO must be logged in to access your profile
    header("Location: ../index/index.php");
}
    
include_once('../templates/common/footer.php');
?>