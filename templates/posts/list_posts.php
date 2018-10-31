<section id="posts">
<?php

	foreach ($articles as $article) {
		echo $article['id'];
		echo '<h1><a href="news_item.php?id=' . $article['id'] . '">' . $article['title'] . '</a></h1>';
		echo '<p>' . $article['introduction'] . '</p>';
	}
?>
</section>