<?php
include_once('../includes/db_connection.php');

$username = $_SESSION["username"];
$text = $_POST["commentText"];
$epoch = time();
$postId = $_POST["postId"];

$sql = "INSERT INTO comments (date, textbody, upvotes, username, post_id) VALUES (:date, :textbody, :upvotes, :author, :postID)";
$params = [':date' => $epoch, ':textbody' => $fulltext, ':upvotes' => 0, ':author' => $username, ':postID' => $postId];

try {
    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
        header("Location: ..");
    } else {
        $db->errorInfo();
    }
}catch(Exception $e) {echo "Couldn't create post.";}
?>