<?php 
include_once('../database/connection.php');
include_once('../database/posts.php');
include_once('../database/comments.php');
$postId = $_GET["id"];
$post = getPost($postId);
$comments = getPostComments($postId);

?>
<section id = post>
	<h1><?= $post["title"] ?></h1>
	<p id="author">by <a href="user_page.php?username=<?= $post['author'] ?>"><?= $post['author'] ?></a></p>
	<p id="date">in <?= date("d-m-Y", $post['date']) ?></p>
	<p id="textbody"><?= $post['textbody'] ?></p>
	<p id = upvote> <?=$post["upvotes"]?> </p>
</section>