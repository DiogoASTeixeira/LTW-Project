<form action="../actions/action_create_post.php" method="post">
Title: <input type="text" name="title" value="" ><br>
Text: <input type="text" name="fulltext" value=""><br>
<input type = "hidden" name="username" value="<?=$_SESSION["username"]?>">
<input type="submit">
</form>
