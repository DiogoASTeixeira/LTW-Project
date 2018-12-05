<?php
include_once('../includes/db_connection.php');
include_once('../includes/session.php');

$username = $_SESSION["username"];
$safeText = htmlspecialchars($_POST["commentText"]);
$epoch = time();
$postId = $_POST["postId"];

if (insertComment($username, $safeText, $postId))
        $_SESSION['msg'] = array('type' => 'success', 'message' => 'Comment added successfully.');
else
        $_SESSION['msg'] = array('type' => 'error', 'message' => 'Couldn\'t insert comment.');
header("Location:../post/post_item.php?id=" . $postId);
?>