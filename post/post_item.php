<?php
include_once('../includes/session.php');
include_once('../includes/db_connection.php');

include_once('../database/posts.php');
include_once('../database/comments.php');

include_once('../templates/common/header.php');


$postId = $_GET["id"];
$post = getPost($postId);
$comments = get_post_comments($postId);

?>
<section id="post_item">
    <?php

    include_once('../templates/posts/post_item.php');
    if(isset($_SESSION['username']))
        include_once('../templates/comments/write_comment.php');

    ?>
    <section id=comments>
        <?php
        foreach ($comments as $comment) {
            include('../templates/comments/single_comment.php');
        }
        ?>
    </section>
</section>


<?php
include_once('../templates/common/footer.php');
?>
