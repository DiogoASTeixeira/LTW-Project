<section id = "single_post">
    <h1><?= $post["title"] ?></h1>
    <p id="author">by <a href="../profile/profile.php?username=<?= $post['username'] ?>"><?= $post['username'] ?></a></p>
    <p id="date">in <?= date("d-m-Y", $post['date']) ?></p>
    <p id="textbody"><?= $post['textbody'] ?></p>
    <button type="button">Upvote</button> 
    <p id = upvote> <?=$post["upvotes"]?> </p>
    <button type="button">Downvote</button> 
</section>