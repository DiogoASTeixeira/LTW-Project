<?php
include_once(__DIR__ . '/../database/connection.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
$params = [':username' => $username, ':password' => $password, ':email' => $email];
try {
	if ($stmt = $db->prepare($sql)) {
		$stmt->execute($params);
		header("Location: ../authentication/login.php");
	} else {
		$db->errorInfo();
	}
}catch(Exception $e) {echo "Username already taken.";}
die();
?>