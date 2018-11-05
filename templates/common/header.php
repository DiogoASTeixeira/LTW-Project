<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <title>Weeb Site</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1><a href="../index.php">Reddit</a></h1>
            <h2><a href="../index.php">The front page of the Internet!</a></h2>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            ?>
            <h3>Welcome, <?= $_SESSION["username"] ?></h3>
            <div id="user_action">
                <a href="../post/create_post.php"> Create Post</a>
                <a href="../actions/action_logout.php">Logout</a>
            </div>
            <?php

            } else {
            ?>
            <h3>Greetings, stranger</h3>
            <div id="signup">
                <a href="../authentication/register.php">Register</a>
                <a href="../authentication/login.php">Login</a>
            </div>
            <?php 
            } ?>

        </header>