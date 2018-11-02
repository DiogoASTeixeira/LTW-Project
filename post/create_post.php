<?php
//include_once('../database/connection.php');
//include_once('../database/news.php');
//$id = $_GET['id'];
//$article = getNews($id);
include_once('../templates/common/header.php');
?>


<form action="../actions/action_create_post.php" method="post">
Title: <input type="text" name="title" value="" ><br>
Text: <input type="text" name="fulltext" value=""><br>
<input type = "hidden" name="username" value="<?=$_SESSION["username"]?>">
<input type="submit">
</form>

<?php
include_once('../templates/common/footer.php');
?>