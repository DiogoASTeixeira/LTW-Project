<?php
include_once('../includes/session.php');
include_once('../includes/db_connection.php');

if(!isset($_SESSION['username']))
    echo "ERROR";

include_once('../database/comments.php');
$post_id = $_REQUEST['post_id'];
$value = $_REQUEST['value'];
$username = $_SESSION['username'];

$a = vote_post($username, $post_id, $value);
$b = get_vote_value($username, $post_id);

$returnArray = array($a, $b);

$json_return = json_encode($returnArray);
    
echo $json_return;
?>