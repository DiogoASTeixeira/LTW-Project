<?php
include_once('../includes/session.php');
include_once('../includes/db_connection.php');

if(!isset($_SESSION['username']))
    echo "ERROR";

include_once('../database/posts.php');

$post_id = (int)$_REQUEST['post_id'];
$username = $_SESSION['username'];

echo get_vote_value($username, $post_id);
?>