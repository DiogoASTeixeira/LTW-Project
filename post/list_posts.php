<section id="posts">
    <?php
    include_once('../database/posts.php');
    $posts = getAllPosts();
    foreach ($posts as $post) {
        include('../templates/posts/post_in_list.php');
    } 
    ?>

</section>