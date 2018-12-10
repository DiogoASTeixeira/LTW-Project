<?php
include_once('../includes/session.php');
include_once('../templates/common/header.php');
include_once('../database/posts.php');
$posts = getAllPosts();
?>

<section id="list_posts">

    <?php
    foreach ($posts as $post) {
        include('../templates/posts/post_in_list.php');
    } 
    ?>

</section>

<?php
include_once('../templates/common/footer.php');

?>