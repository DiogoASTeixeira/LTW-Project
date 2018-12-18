<?php
include_once('../includes/session.php');
include_once('../includes/db_connection.php');

if(!isset($_SESSION['username']))
    echo "ERROR";

include_once('../database/comments.php');
$comment_id = $_REQUEST['comment_id'];
$value = $_REQUEST['value'];
$username = $_SESSION['username'];

$a = vote_comment($username, $comment_id, $value);
$b = get_comment_vote_value($username, $comment_id);

$returnArray = array($a, $b);

$json_return = json_encode($returnArray);
    
echo $json_return;
?>