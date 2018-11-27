<?php
session_start();
include_once('../database/connection.php');

$username = $_SESSION['username'];
$oldPassword = $_POST["oldPassword"];
$newPassword = $_POST["newPassword"];
$confirmPassword = $_POST["confirmPassword"];

if(strcmp($confirmPassword, $newPassword) != 0)
{
    //TODO Passwords dont match
    echo "wrong";
    die();
}

$sql = "SELECT password FROM  users WHERE username = :username";
$params = [':username' => $username];

if($stmt = $db->prepare($sql))
{
    $stmt->execute($params);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    if($oldPassword === $result["password"])
    {
        $sql = "UPDATE users SET password = :password WHERE username = :username";
        $params = ['password' => $newPassword,':username' => $username];
        if($stmt = $db->prepare($sql))
        {
            $stmt->execute($params);
            echo "YAY";
            header("Location:../profile/profile.php");
            die();
        }
    }
    else{
        //TODO old Password wrong
        echo "bad";
        die();
    }
}



?>