<section id="posts">
<?php
include_once('../database/posts.php');
$posts = getAllPosts();
foreach ($posts as $post) {
	?>
	<h1><a href="../post/post_item.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h1>
	<p id="author">by <a href="user_page.php?username=<?=$post['author']?>"><?=$post['author']?></a>
	 in <?=date("d-m-Y", $post['date'])?></p>
	<p id="textbody"><?= $post['textbody'] ?></p>
<?php
} 
?>

</section>