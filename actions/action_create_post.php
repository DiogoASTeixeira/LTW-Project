<?php
include_once('../includes/session.php');
include_once('../includes/db_connection.php');

include_once('../database/posts.php');

//user is logged in
if(!isset($_SESSION["username"]))
{
    $_SESSION['msg'] = array('type' => 'warning', 'message' => 'Must log in before creating a post.');
    header("Location: ../authentication/login.php");
    die();
}

$username = $_SESSION["username"];
$title = $_POST["title"];
$fulltext = $_POST["fulltext"];

if(ctype_space($title) || ctype_space($fulltext) || $title == '' || $fulltext == '')
{
    $_SESSION['msg'] = array('type' => 'warning', 'message' => 'Cannot create post with empty title or contents.');
    header("Location: ../post/create_post.php");
    die();
}

//Letters, numbers and whitespaces allowed, replace the rest
$title = htmlspecialchars($title);
$fulltext = htmlspecialchars($fulltext) ;

try {
    create_post($username, $title, $fulltext);
    $_SESSION['msg'] = array('type' => 'success', 'message' => 'Post created.');

}catch(Exception $e) {
    $_SESSION['msg'] = array('type' => 'error', 'message' => 'An error occured while creating the post.');
}
header("Location: ../index/index.php");
?>