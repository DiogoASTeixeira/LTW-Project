<?php
include_once('../includes/session.php');

include_once('../templates/common/header.php');

include_once('../includes/db_connection.php');
include_once('../database/posts.php');
include_once('../database/comments.php');

$postId = $_GET["id"];
$post = getPost($postId);
$comments = getPostComments($postId);

include_once('../templates/posts/post_item.php');

?>
<section id=comments>
    <?php
    foreach ($comments as $comment) {
        include('../templates/comments/single_comment.php');
    }

    include_once('../templates/common/footer.php');
    ?>
</section>