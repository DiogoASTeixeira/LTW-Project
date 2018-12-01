<?php
include_once('../templates/common/header.php');
if($_SESSION["loggedin"])
    include_once('../templates/posts/create_post.php');

else 
    header("Location: ../authentication/login.php");

include_once('../templates/common/footer.php');
?>