<?php
include_once('../includes/db_connection.php');

function validateUser($username, $password)
{
    global $db;
    $sql = "SELECT password FROM users WHERE username = :username";
    $params = [':username' => $username];

    $stmt = $db->prepare($sql);
    $stmt->execute($params);

    $result = $stmt->fetch();

    return $result !== false && password_verify($password, $result["password"]);
}

function insertUser($username, $password)
{
    global $db;
    $options = ['cost' => 8];

    $hashed_password= password_hash($password, PASSWORD_DEFAULT, $options);
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $params = [':username' => $username, ':password' => $hashed_password];

    $stmt = $db->prepare($sql);
    $stmt->execute($params);
}

function changePassword($username,  $newPassword)
{
    global $db;

    $options = ['cost' => 8];
    $hashed_password= password_hash($newPassword, PASSWORD_DEFAULT, $options);

    $sql = "UPDATE users SET password = :password WHERE username = :username";
    $params = ['password' => $hashed_password,':username' => $username];

    $stmt = $db->prepare($sql);
    $stmt->execute($params);
}
?>