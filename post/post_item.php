<?php
include_once('../templates/common/header.php');

include_once('../includes/db_connection.php');
include_once('../database/posts.php');
include_once('../database/comments.php');

$postId = $_GET["id"];
$post = getPost($postId);
$comments = getPostComments($postId);

include_once('../templates/posts/post_item.php');
include_once('../templates/comments/post_comments.php');
include_once('../templates/common/footer.php');
?>