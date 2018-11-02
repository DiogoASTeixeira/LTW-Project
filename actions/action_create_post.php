<?php
	include_once(__DIR__ . '/../database/connection.php');

	$username = $_POST["username"];
	$title = $_POST["title"];
	$fulltext = $_POST["fulltext"];
	$epoch = time(); 

	$sql = "INSERT INTO posts (author, date, title, textbody, upvotes) VALUES (:author, :date, :title, :textbody, :upvotes)";
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