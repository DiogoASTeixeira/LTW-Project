<?php
include_once('../includes/session.php');
include_once('../templates/common/header.php');
if(isset($_SESSION["username"]))
    include_once('../templates/posts/create_post.php');

else {
    $_SESSION['msg'] = array('type' => 'warning', 'message' => 'Must log in before creating a post.');
    header("Location: ../authentication/login.php");
}

include_once('../templates/common/footer.php');
?>