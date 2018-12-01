<?php
include_once('../includes/session.php');
include_once('../includes/db_connection.php');

//user is logged in
if (!isset($_SESSION['username'])){
    header('Location: ../pages/login.php');
    die();
}

$username = $_SESSION["username"];
$title = $_POST["title"];
$fulltext = $_POST["fulltext"];
$epoch = time(); 

//Letters, numbers and whitespaces allowed, replace the rest
$title = preg_replace ("/[^a-zA-Z0-9\s]/", '', $title);
$fulltext = preg_replace ("/[^a-zA-Z\s]/", '', $fulltext);

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