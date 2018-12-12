<?php
include_once('../includes/db_connection.php');
function getAllPosts($order)
{
    global $db;

    switch($order){
        case 'date':
            $order = 'date';  
            break;
        case 'votes':
        default:
            $order = 'upvotes';
    }

    $string = 'SELECT * FROM posts ORDER BY '. $order .' DESC';
    $stmt = $db->prepare($string);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getPost($id)
{
    global $db;

    $sql = 'SELECT * FROM posts WHERE post_id=:id LIMIT 1';
    $params = [':id' => $id];

    if ($stmt = $db->prepare($sql)) {
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

    $sql = 'SELECT * FROM posts WHERE username=:username';
    $params = ['username' => $username];

    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
        return $stmt->fetchAll();
    } else {
        echo "Couldn't retrive post!";
    }
    return false;
}

function create_post($username, $title, $textbody)
{
    $epoch = time(); 
    
    $sql = "INSERT INTO posts (username, date, title, textbody, upvotes) VALUES (:author, :date, :title, :textbody, :upvotes)";
    $params = [':author' => $username, ':date' => $epoch, ':title' => $title, ':textbody' => $fulltext, ':upvotes' => 0];

    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
    } else {
        $db->errorInfo();
    }
}

function votePost($username, $post_id, $value)
{
    global $db;

}

function epochToTime($epoch)
{
    return substr($epoch, 0, 10);
}
?>