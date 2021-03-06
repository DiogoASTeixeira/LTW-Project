<?php
include_once('../includes/db_connection.php');
function get_post_comments($postId)
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

function get_comments_of_user($username)
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

function get_comment($id)
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

function insert_comment($username, $text, $postId)
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

function vote_comment($username, $comment_id, $value){
    global $db;
    $value = $value == 1 ? 1 : -1;

    $sql = 'SELECT vote_value FROM comment_votes WHERE username = :username AND comment_id = :comment_id';
    $params = [':username' => $username, ':comment_id' => $comment_id];

    if($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
        $user_voted =  $stmt->fetch();

        if(!$user_voted) {
            $sql = 'INSERT INTO comment_votes (username, comment_id, vote_value) VALUES (:username, :comment_id, :values)';
            $params = [':username' => $username, 'comment_id' => $comment_id, ':values' => $value];
            if ($stmt = $db->prepare($sql)) {
                $stmt->execute($params);
            }
            else 
                $db->errorInfo();
        }
        else {
            $vote_value = get_comment_vote_value($username, $post_id);
            if($values == $vote_value)
            {
                $sql = 'DELETE FROM comment_votes WHERE username = :username AND comment_id = :comment_id';
                $params = [':username' => $username, ':comment_id' => $comment_id];
                if ($stmt = $db->prepare($sql))
                    $stmt->execute($params);
                else 
                    $db->errorInfo();
            }
            else 
            {
                $sql = 'UPDATE comment_votes SET vote_value = :value WHERE username = :username AND comment_id = :comment_id';
                $params = [':value' => $value, ':username' => $username, ':comment_id' => $comment_id];
                if ($stmt = $db->prepare($sql))
                    $stmt->execute($params);
                else 
                    $db->errorInfo();
            }
        }
        update_comment_vote_count($comment_id);
        return get_comment_upvote_count($comment_id);

    } else {
        echo "Couldn't retrive post!";
    }
}

function get_comment_vote_value($comment_id)
{
    global $db;

    $sql = 'SELECT upvotes FROM comments WHERE comment_id = :comment_id';
    $params = [':comment_id' => $comment_id];

    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
        $vote_count = $stmt->fetch();
        return $vote_count["upvotes"];
    }
}

function update_comment_vote_count($comment_id)
{
    global $db;

    $sql = 'SELECT SUM(vote_value) AS total_votes FROM comment_votes WHERE comment_id = :comment_id';
    $params = [':comment_id' => $comment_id];

    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
        $vote_count = (int)$stmt->fetch()["total_votes"];
        if(is_null($vote_count))
            $vote_count = 0;
        $sql = 'UPDATE comments SET upvotes=:vote_count WHERE comment_id = :comment_id';
        $params = [':vote_count' => $vote_count, ':comment_id' => $comment_id];
        if ($stmt = $db->prepare($sql)) {
            $stmt->execute($params);
        }
    }
}
?>