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
    global $db;
    $epoch = time(); 

    $sql = "INSERT INTO posts (username, date, title, textbody, upvotes) VALUES (:author, :date, :title, :textbody, :upvotes)";
    $params = [':author' => $username, ':date' => $epoch, ':title' => $title, ':textbody' => $textbody, ':upvotes' => 0];

    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
    } else {
        $db->errorInfo();
    }
}

function vote_post($username, $post_id, $value)
{
    global $db;
    $value = $value == 1 ? 1 : -1; 

    $sql = 'SELECT vote_value FROM post_votes WHERE username = :username AND post_id = :post_id';
    $params = [':username' => $username, ':post_id' => $post_id];

    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
        $user_voted = $stmt->fetch();

        if(!$user_voted) //User has no vote in this post
        {
            $sql = 'INSERT INTO post_votes (username, post_id, vote_value) VALUES (:username, :post_id, :values)';
            $params = [':username' => $username, ':post_id' => $post_id, ':values' => $value];

            if ($stmt = $db->prepare($sql)) {
                $stmt->execute($params);
            }
            else 
                $db->errorInfo();
        }
        else
        {
            $sql = 'SELECT vote_value FROM post_votes WHERE username = :username AND post_id = :post_id';
            $params = [':username' => $username, ':post_id' => $post_id];


            $vote_value = get_vote_value($username, $post_id);
            if($value == $vote_value) //reclicked same value == cancel vote
            {
                $sql = 'DELETE FROM post_votes WHERE username = :username AND post_id = :post_id';
                $params = [':username' => $username, ':post_id' => $post_id];
                if ($stmt = $db->prepare($sql))
                    $stmt->execute($params);
                else 
                    $db->errorInfo();
            }
            else 
            {
                $sql = 'UPDATE post_votes SET vote_value = :value WHERE username = :username AND post_id = :post_id';
                $params = [':value' => $value, ':username' => $username, ':post_id' => $post_id];
                if ($stmt = $db->prepare($sql))
                    $stmt->execute($params);
                else 
                    $db->errorInfo();
            }
        }
        update_post_vote_count($post_id);
        return get_post_upvote_count($post_id);
    } else {
        echo "Couldn't retrive post!";
    }
}

function get_vote_value($username, $post_id)
{
    global $db;
    $sql = 'SELECT vote_value FROM post_votes WHERE username = :username AND post_id = :post_id';
    $params = [':username' => $username, ':post_id' => $post_id];

    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);

        return (int)$stmt->fetch()["vote_value"];
    }
}

function get_post_upvote_count($post_id)
{
    global $db;

    $sql = 'SELECT upvotes FROM posts WHERE post_id = :post_id';
    $params = [':post_id' => $post_id];

    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
        $vote_count = $stmt->fetch();
        return $vote_count["upvotes"];
    }
}

function update_post_vote_count($post_id)
{
    global $db;

    $sql = 'SELECT SUM(vote_value) AS total_votes FROM post_votes WHERE post_id = :post_id';
    $params = [':post_id' => $post_id];

    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
        $vote_count = (int)$stmt->fetch()["total_votes"];
        if(is_null($vote_count))
            $vote_count = 0;
        $sql = 'UPDATE posts SET upvotes=:vote_count WHERE post_id=:post_id';
        $params = [':vote_count' => $vote_count, ':post_id' => $post_id];
        if ($stmt = $db->prepare($sql)) {
            $stmt->execute($params);
        }
    }
}

function epochToTime($epoch)
{
    return substr($epoch, 0, 10);
}
?>