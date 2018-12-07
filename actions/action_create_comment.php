<?php
include_once('../includes/db_connection.php');
include_once('../includes/session.php');

include_once('../database/comments.php');

header('Content-Type: application/json');

$username = $_SESSION["username"];
$safeText = htmlspecialchars($_POST["commentText"]);
$postId = $_POST["postId"];

if (insertComment($username, $safeText, $postId)){
    $_SESSION['msg'] = array('type' => 'success', 'message' => 'Comment added successfully.');
    echo json_encode($safeText);
}
else{
    $_SESSION['msg'] = array('type' => 'error', 'message' => 'Couldn\'t insert comment.');
    die(json_encode(array('error' => 'Couldn\'t create Comment')));
}
//header("Location:../post/post_item.php?id=" . $postId);
?>