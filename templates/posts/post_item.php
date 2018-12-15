<section id = "single_post">
    <h1><?= $post["title"] ?></h1>
    <p id="author">by <a href="../profile/profile.php?username=<?= $post['username'] ?>"><?= $post['username'] ?></a></p>
    <p id="date">in <?= date("d-m-Y", $post['date']) ?></p>
    <p id="textbody"><?= $post['textbody'] ?></p>
    <p id="post_id"><?= $post['post_id'] ?></p>
    <?php 
    if(isset($_SESSION['username']))
    {
    ?>
    <button id="upvoteBtn" type="button" onmouseup="votePost(<?=$post["post_id"]?>, 1)">Upvote</button> 
    <button id="downvoteBtn" type="button" onmouseup="votePost(<?=$post["post_id"]?>, -1)">Downvote</button> 
    <?php
    }
    ?>
    <p id = upvote> <?=$post["upvotes"]?> </p>
</section>