<section id = "single_post">
    <h1><?= $post["title"] ?></h1>
    <p id="author">by <a href="../profile/profile.php?username=<?= $post['username'] ?>"><?= $post['username'] ?></a></p>
    <p id="date">in <?= date("d-m-Y", $post['date']) ?></p>
    <p id="textbody"><?= $post['textbody'] ?></p>
    <button id="upvoteBtn" type="button" onmouseup="votePost(<?=$post["post_id"]?>, 1)">Upvote</button> 
    <p id = upvote> <?=$post["upvotes"]?> </p>
    <button id="downvoteBtn" type="button" onmouseup="votePost(<?=$post["post_id"]?>, -1)">Downvote</button> 
</section>