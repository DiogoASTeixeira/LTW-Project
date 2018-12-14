<?php
include_once('../includes/session.php');
include_once('../includes/db_connection.php');

if(!isset($_SESSION['username']))
    echo "ERROR";

include_once('../database/posts.php');
$post_id = $_REQUEST['post_id'];
$value = $_REQUEST['value'];
$username = $_SESSION['username'];

echo votePost($username, $post_id, $value);
?>