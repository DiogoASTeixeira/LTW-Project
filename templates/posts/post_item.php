<section id = single_post>
    <h1><?= $post["title"] ?></h1>
    <p id="author">by <a href="user_page.php?username=<?= $post['username'] ?>"><?= $post['username'] ?></a></p>
    <p id="date">in <?= date("d-m-Y", $post['date']) ?></p>
    <p id="textbody"><?= $post['textbody'] ?></p>
    <p id = upvote> <?=$post["upvotes"]?> </p>
</section>