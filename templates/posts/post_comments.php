<section id=comments>
<?php
foreach ($comments as $comment) {
	?>
	<section id = singleComment>
	<p id = author><?= $comment["author"] ?> said:</p>
	<p id = textbody><?= $comment["textbody"] ?></p>
	<p id = upvotes><?= $comment["upvotes"] ?></p>	
	</section>
<?php

}
?>
</section>