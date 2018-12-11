<?php
include_once('../includes/db_connection.php');

include_once('../database/posts.php');

if( isset($_GET['order']) )
    $posts = getAllPosts($_GET['order']);
else
    $posts = getAllPosts('date');


foreach ($posts as $post) {
    include('../templates/posts/post_in_list.php');
}?>