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

function getCommentsOfUser($username)
{
    global $db;
    if ($stmt = $db->prepare('SELECT * FROM comments WHERE username=:username')) {
        $params = [':username' => $username];
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

function insertComment($username, $text, $postId)
{
    global $db;
    $epoch = time();
    
    $sql = "INSERT INTO comments (date, textbody, upvotes, username, post_id) VALUES (:date, :textbody, :upvotes, :author, :postID)";
    $params = [':date' => $epoch, ':textbody' => $text, ':upvotes' => 0, ':author' => $username, ':postID' => $postId];

    try {
        if ($stmt = $db->prepare($sql)) {
            $stmt->execute($params);
            return true;
        } else {
            $db->errorInfo();
        }
    }catch(Exception $e) {return false;}
}
?>