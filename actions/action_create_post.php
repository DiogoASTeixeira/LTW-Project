<?php
include_once('../includes/session.php');
include_once('../includes/db_connection.php');

$username = $_SESSION["username"];
$title = $_POST["title"];
$fulltext = $_POST["fulltext"];
$epoch = time(); 

$sql = "INSERT INTO posts (username, date, title, textbody, upvotes) VALUES (:author, :date, :title, :textbody, :upvotes)";
$params = [':author' => $username, ':date' => $epoch, ':title' => $title, ':textbody' => $fulltext, ':upvotes' => 0];

try {
    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
        header("Location: ../index/index.php");
    } else {
        $db->errorInfo();
    }
}catch(Exception $e) {
    //TODO Warn couldnt create post
}
?>