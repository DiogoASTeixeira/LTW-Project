<section id = "single_post">
    <h1><a href="../post/post_item.php?id=<?= $post['post_id'] ?>"><?= $post['title'] ?></a></h1>
    <p id="author">by <a href="../profile/profile.php?username=<?=$post['username']?>"><?=$post['username']?></a>
        in <?=date("d-m-Y", $post['date'])?></p>
    <p id="textbody"><?= $post['textbody']?></p>
    <p id="upvotes"><?= $post['upvotes']?></p>
</section>
