<section id = single_comment>
    <p id = comment_id><?= $comment["comment_id"] ?></p>
    <p id = author><?= $comment["username"] ?> said:</p>
    <p id = textbody><?= $comment["textbody"] ?></p>
    <?php 
    if (isset($_SESSION['username'])) {
    ?>
    <button id="upvoteBtn" type="button" onmouseup="voteComment(<?= $post["comment_id"] ?>, 1)">Upvote</button> 
    <button id="downvoteBtn" type="button" onmouseup="voteComment(<?= $post["comment_id"] ?>, -1)">Downvote</button> 
    <?php
    }
    ?>
    <p id = upvotes><?= $comment["upvotes"] ?></p>
    <div class="arrowup"></div> 
    <div class="arrowdown"></div> 
</section>

