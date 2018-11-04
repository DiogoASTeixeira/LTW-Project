<?php
include_once('connection.php');
function getPostComments($postId)
{
	global $db;
	if ($stmt = $db->prepare('SELECT * FROM comments WHERE idPost=:postId ORDER BY upvotes DESC')) {
		$params = [':postId' => $postId];
		$stmt->execute($params);
		return $stmt->fetchAll();
	} else {
		echo "Couldn't retrieve comments!";
		return false;
	}
}

function getComment($id)
{
	global $db;
	if ($stmt = $db->prepare('SELECT * FROM comments WHERE id=:id LIMIT 1')) {
		$params = [':id' => $id];
		$stmt->execute($params);
		return $stmt->fetch();
	} else {
		echo "Couldn't retrive post!";
	}
	return false;
}
?>