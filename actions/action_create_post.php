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
$title = htmlspecialchars($title);
$fulltext = htmlspecialchars($fulltext) ;

$sql = "INSERT INTO posts (username, date, title, textbody, upvotes) VALUES (:author, :date, :title, :textbody, :upvotes)";
$params = [':author' => $username, ':date' => $epoch, ':title' => $title, ':textbody' => $fulltext, ':upvotes' => 0];

try {
    if ($stmt = $db->prepare($sql)) {
        $stmt->execute($params);
    } else {
        $db->errorInfo();
    }
}catch(Exception $e) {
    $_SESSION['msg'] = array('type' => 'error', 'message' => 'An error occured while creating the post.');
}
header("Location: ../index/index.php");

?>