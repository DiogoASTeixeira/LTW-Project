<?php
include_once('../includes/db_connection.php');
function getAllPosts()
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM posts ORDER BY date DESC');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getPost($id)
{
    global $db;
    if ($stmt = $db->prepare('SELECT * FROM posts WHERE post_id=:id LIMIT 1')) {
        $params = [':id' => $id];
        $stmt->execute($params);
        return $stmt->fetch();
    } else {
        echo "Couldn't retrive post!";
    }
    return false;
}

function getPostsOfUser($username)
{
    global $db;
    if ($stmt = $db->prepare('SELECT * FROM posts WHERE username=:username')) {
        $params = ['username' => $username];
        $stmt->execute($params);
        return $stmt->fetchAll();
    } else {
        echo "Couldn't retrive post!";
    }
    return false;
}

function epochToTime($epoch)
{
    return substr($epoch, 0, 10);
}
?>