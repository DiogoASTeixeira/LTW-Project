<?php
include_once('connection.php');
function getAllPosts() {
  global $db;
	$stmt = $db->prepare('SELECT * FROM posts ORDER BY date DESC');
  $stmt->execute();
  return $stmt->fetchAll();
}

function epochToTime($epoch)
{
  return substr($epoch, 0, 10);
}
?>