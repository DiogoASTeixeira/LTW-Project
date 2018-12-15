<?php
include_once('../includes/session.php');
include_once('../templates/common/header.php');
include_once('../database/posts.php');

if( isset($_GET['order']) )
    $posts = getAllPosts($_GET['order']);
else
    $posts = getAllPosts('date');

include('../templates/posts/order_items.php');
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