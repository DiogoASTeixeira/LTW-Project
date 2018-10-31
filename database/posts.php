<?php
function getAllPosts() {
  global $db;
	$stmt = $db->prepare('SELECT * FROM news');
  $stmt->execute();
  return $stmt->fetchAll();
}
?>