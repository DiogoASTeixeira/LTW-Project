<?php
include_once('../includes/db_connection.php');
function getPostComments($postId)
{
    global $db;
    if ($stmt = $db->prepare('SELECT * FROM comments WHERE post_id=:post_id ORDER BY upvotes DESC')) {
        $params = [':post_id' => $postId];
        $stmt->execute($params);
        return $stmt->fetchAll();
    } else {
        echo "Couldn't retrieve comments!";
        return false;
    }
}

function getComment($id)
{
    global $db;
    if ($stmt = $db->prepare('SELECT * FROM comments WHERE comment_id=:comment_id LIMIT 1')) {
        $params = [':comment_id' => $id];
        $stmt->execute($params);
        return $stmt->fetch();
    } else {
        echo "Couldn't retrive post!";
    }
    return false;
}
?>