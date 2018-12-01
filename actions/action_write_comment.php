<?php
include_once('../includes/db_connection.php');

$username = $_POST["username"];
$text = $_POST["textbody"];
$epoch = time();
$idPost = $_POST["idPost"];

$sql = "INSERT INTO comments (author, date, title, textbody, upvotes) VALUES (:author, :date, :title, :textbody, :upvotes)";
$params = [':author' => $username, ':date' => $epoch, ':title' => $title, ':textbody' => $fulltext, ':upvotes' => 0];

try {
    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
        header("Location: ..");
    } else {
        $db->errorInfo();
    }
}catch(Exception $e) {echo "Couldn't create post.";}
?>