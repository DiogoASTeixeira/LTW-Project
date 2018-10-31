<?php
function userExists($username, $password)
{
	include('../database/connection.php');
	$sql = "SELECT password FROM users WHERE username = :username";
	$params = [':username' => $username];
	var_dump($db);
	if ($stmt = $db->prepare($sql)) {
		$stmt->execute($params);
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetch();
		//TODO password encryption
		return $password === $result["password"];

	}
	return false;
}
?>