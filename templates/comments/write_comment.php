<form id="write_comment" action="../actions/action_create_comment.php" method="post" onsubmit="checkEmptiness()">
    <input type="hidden" name="postId" value="<?=$post["post_id"]?>">
    <textarea id="write_comment" name="commentText" rows="4"></textarea><br>
    <input id="write_comment" type="submit" value="Comment">
</form>