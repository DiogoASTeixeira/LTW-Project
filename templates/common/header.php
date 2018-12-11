<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <title>Quokka</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/layout.css" rel="stylesheet">
        <script src="script.js" defer></script>
    </head>
    <body>
        <header>
            <div id="quokka_header">
                <a href="../index.php">
                    <img src="../images/quokka_header.png" alt="Quokka">
                </a>
            </div>
            <h1><a href="../index.php">Quokka</a></h1>
            <h2 id="search_bar"><a href="../index.php">Barra de Pesquisa</a></h2>
            <?php
            if (isset($_SESSION['username'])) {
            ?>
            <h3>Welcome, <a href="../profile/profile.php"><?= $_SESSION["username"] ?></a></h3>
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

        <?php
        if (isset($_SESSION['msg'])) {
            $msg = $_SESSION["msg"];
        ?>
        <section id="msg">
            <div class="<?=$msg["type"]?>"><?=$msg["message"]?></div>
        </section>
        <?php unset($_SESSION['msg']);}?>

