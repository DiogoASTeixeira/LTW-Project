<form id="write_comment" action="../actions/action_create_comment.php" method="post">
    <input type="hidden" name="postId" value="<?=$post["post_id"]?>">
    <input type="text" name="commentText"><br>
    <input type="submit" value="Comment">
</form>