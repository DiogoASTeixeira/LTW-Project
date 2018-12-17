<?php 
include_once('../includes/session.php');
include_once('../database/posts.php');
include_once('../database/comments.php');

include_once('../templates/common/header.php');

if (!isset($_GET['username']))
    header("Location: ./profile.php?username=".$_SESSION['username']);

$username = $_GET['username'];
include_once('../templates/profile/profile.php');

if($username === $_SESSION['username']){
?><a href="../profile/edit_profile.php"> Edit Profile </a><?php
}


$userPosts = getPostsOfUser($username);
$userComments = getCommentsOfUser($username);

?>
<section id=profile_posts>
    <h1>Posts</h1>
    <?php
    foreach ($userPosts as $post)
        include('../templates/posts/post_in_list.php');
    ?>
</section>
<section id=profile_comments>
    <h1>Comments</h1>
    <?php
    foreach ($userComments as $comment)
        include('../templates/comments/single_comment.php');
    include_once('../templates/common/footer.php');
    ?>
</section>